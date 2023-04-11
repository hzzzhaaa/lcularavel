<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alert;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function loginUmum(Request $request){
        $username = $request->username;
        $password = $request->password;

        if($request->remember) $ttl = 43800;
        else $ttl = auth('api')->factory()->getTTL();
        $token = auth('api')->setTTL($ttl)->attempt(['username'=>$username, 'password' => $password]);
        $user = User::where('username',$username)->first();
        $user = json_decode($user);
        // dd($user);
        $request->session()->put("user_id",$user->id);
        $request->session()->put("nama", $user->name);
        $request->session()->put("username", $username);
        $request->session()->put("token", $token);

        $request->session()->regenerate();
        $resp = $request->session()->all();
        // dd($resp);

            if(!$token){
                return response()->json([
                    'message'=> 'Username atau Password salah',
                ], 401);
            }else{
                $userinfo = Userinfo::where('user_id',$user->id)->first();
                if($userinfo == null){
                    return redirect()->route('datadiri');
                }else{
                    return redirect()->route('profile');
                }
                // dd($userinfo);
            }
    }

    public function inputInfo(Request $request){

        $resp = $request->session()->all();

        // dd($resp['user_id']);

        $ui = Userinfo::create([
            'user_id'=>$resp['user_id'],
            'nama'=>$request->nama,
            'tempat_lahir'=>$request->tempatLahir,
            'tanggal_lahir'=>$request->tanggalLahir,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp,
            'jenis_kelamin'=>$request->jenisKelamin,
            'kewarganegaraan'=>$request->kewarganegaraan
        ]);
        // dd($ui);
        return redirect()->route("profile");
    }

    public function _register(Request $request){

        $this->validate($request, [
            'nama' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);
        $uname = $request->username;
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
        // dd($request->all());
        $u = User::create([
            'name'=>$nama,
            'username'=>$uname,
            'email'=>$email,
            'password'=>bcrypt($password),
            'token_siakad'=>null,
            'role'=> 2,
            'is_active'=>1,
        ]);
        Alert::success('Congrats', 'You\'ve Successfully Registered');
        return redirect("/");
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        // dd($username);

        $auth = Http::asForm()->post("http://103.8.12.212:36880/siakad_api/api/as400/signin",[
            'username' => $username,
            'password' => $password,
        ]);

        $response = json_decode($auth);
        // dd($response);
        $account_detail = Http::get("http://103.8.12.212:36880/siakad_api/api/as400/dataMahasiswa/$username/$response->Authorization");
        $acc_detail = json_decode($account_detail);
        $acc_detail = $acc_detail->isi['0'];
        // dd($acc_detail->email);
        // dd($response->status);

        if($auth->status() == 500){
            return response()->json(['error'=>'Internal Server Error'], 500);
        }else if($auth == null){
            return response()->json(['error'=>'Unauthorized'],401);
        }

        if($request->remember) $ttl = 43800;
        else $ttl = auth('api')->factory()->getTTL();
        if(User::where('username',$username)->first()==null){
            if($response->mode==9){
                // dd($response->Authorization);
                $u = User::create([
                    'name'=>$response->nama,
                    'username'=>$username,
                    'email'=>$acc_detail->email,
                    'password'=>bcrypt($password),
                    'token_siakad'=>$response->Authorization,
                    'role'=> 1,
                    'is_active'=>1,
                ]);
                // dd($u);
            }
            $token = auth('api')->setTTL($ttl)->attempt(['username'=>$username, 'password' => $password]);
            $userid = User::where('username',$username)->get('id');
            $userid = json_decode($userid);
            $userid = $userid['0']->id;
            if(Userinfo::where('nama',$response->nama)->first()==null){
                $ui = Userinfo::create([
                    'user_id'=>$userid,
                    'nama'=>$response->nama,
                    'tempat_lahir'=>$acc_detail->tempatLahir,
                    'tanggal_lahir'=>$acc_detail->tanggalLahir,
                    'alamat'=>$acc_detail->alamat,
                    'no_telp'=>$acc_detail->hpm,
                    'jenis_kelamin'=>$acc_detail->kelamin,
                    'kewarganegaraan'=>'indonesia',
                    'nim'=>$username,
                    'prodi'=>$acc_detail->namaProdi,
                    'jenjang'=>$acc_detail->jenjangProdi,
                    'angkatan'=>$acc_detail->angkatan
                ]);
            }
            $request->session()->put("user_id",$userid);
            $request->session()->put("nama", $response->nama);
            $request->session()->put("username", $username);
            $request->session()->put("token", $token);

            $request->session()->regenerate();
            $resp = $request->session()->all();
            return redirect()->route('profile');
        }else{
            $token = auth('api')->setTTL($ttl)->attempt(['username'=>$username, 'password' => $password]);
            $userid = User::where('username',$username)->get('id');
            $userid = json_decode($userid);
            $userid = $userid['0']->id;

            $request->session()->put("user_id",$userid);
            $request->session()->put("nama", $response->nama);
            $request->session()->put("username", $username);
            $request->session()->put("token", $token);

            $request->session()->regenerate();
            $resp = $request->session()->all();
            // dd($resp);
            return redirect()->route('profile');
            // if(!$token) return response()->json([
            //     'message'=> 'Username atau Password salah',
            //     'status'=>$response->status
            // ], 401);
        }
    }
    protected function authenticated(Request $request, $user)
    {
        //
    }

    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->session()->flush();


        return redirect()->route('home');
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $response)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'mode' => $response->mode,
            'status' => $response->status,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
