<?php

namespace App\Http\Controllers;

use App\Models\Userinfo;
use App\Models\UserIdentity;
use App\Models\Registration;
use App\Models\Event;
use App\Models\EventSchedule;
use App\Models\PaymentMethod;
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


    public function schedule(Request $request)
    {
        // $eventschedule = EventSchedule::where("event_id")
        $resp = $request->session()->all();
        $userid = $resp['user_id'];
        $schedule = Registration::where("user_id",$userid)->get();
        $schedule_list = null;

        foreach($schedule as $s)
        {
            $s->event_id = Event::where("id",$s->event_id)->first();
            $s->schedule_id = EventSchedule::where("id",$s->schedule_id)->first();
            $s->paymentmethod_id = PaymentMethod::where("id",$s->paymentmethod_id)->first();
            $s->schedule_list = EventSchedule::where('event_id',$s->event_id->id)->get();
            foreach($s->schedule_list as $list){
                $list->event_id =Event::where("id",$list->event_id)->first();
            }
        }

        // if($schedule->event_id->type=="Express")
        // {
        //     $schedule_list =EventSchedule::where("event_id",[3,4])->get();
        // }else{
        //     $schedule_list =EventSchedule::where("event_id",[1,2])->get();
        // }
        // $schedule_list = EventSchedule::all();
        // foreach ($schedule_list as $list)
        // {
        //     $list->event_id = Event::where("id",$list->event_id)->first();
        // }
        // $schedule_list = json_decode($schedule_list);
        // // dd($schedule_list);
        // $schedule = json_decode($schedule);
        // dd($schedule);

        return view("pages/mahasiswa/schedule",["data"=>$schedule]);
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
