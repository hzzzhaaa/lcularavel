<?php

namespace App\Http\Controllers;

use App\Models\Userinfo;
use App\Models\UserIdentity;
use Illuminate\Http\Request;
use Auth;
use Alert;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware("admin");
		$this->middleware("isLogin");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $resp = $request->session()->all();
        // dd($resp);
        $nama = $resp['user_id'];
        // dd($nama);
        $userinfo = Userinfo::where('user_id',$nama)->first();
        $userinfo = json_decode($userinfo);
        $ktp = UserIdentity::where('user_id',$nama)->first();
        $ktp = json_decode($ktp);
        // dd($ktp);
        // dd($userinfo);
        // $userinfo = $userinfo['0'];
        return view("pages/mahasiswa/home",["data"=>$userinfo,"ktp"=>$ktp]);
    }

    public function upload_user_identity(Request $request)
    {
        $ktp = $request->ktp;
        $resp = $request->session()->all();
        $userid = $resp['user_id'];

        $imageName = 'ktp'.$userid.'.'.'jpg';
        $uploadedImage = $request->ktp->move(public_path('img/ktp_user'), $imageName);
        $imagePath = 'img/ktp_user/' . $imageName;
        $u = UserIdentity::create([
            'user_id'=>$userid,
            'img_info'=>$imagePath,
            'status'=>"requested"
        ]);
        Alert::success('Congrats', 'KTP Kamu Sudah Terupload');
        return redirect()->route('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
    }

    public function datadiri()
    {
        return view("datadiri");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
