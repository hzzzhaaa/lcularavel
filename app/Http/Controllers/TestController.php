<?php

namespace App\Http\Controllers;

use App\Models\UserIdentity;
use App\Models\Userinfo;
use App\Models\Event;
use App\Models\Registration;
use Auth;
use Alert;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function toep(Request $request)
    {
        $resp = $request->session()->all();

        $userid = $resp['user_id'];
        $userinfo = Userinfo::where('user_id',$userid)->first();
        $useridentity = UserIdentity::where('user_id',$userid)->first();
        $event = Event::all();
        $event = json_decode($event);
        $paymentmethod = PaymentMethod::all();
        return view("pages/mahasiswa/toep", ["event"=>$event,"data"=>$userinfo, "useridentity"=>$useridentity,"paymentmethod"=>$paymentmethod]);
    }

    public function daftarToep (Request $request, $userid)
    {
        // dd($request->all(),$userid);
        $u = Registration::create([
            'user_id'=>$userid,
            'event_id'=>$request->type,
            'event_name'=>"TOEP",
            'schedule_id'=>null,
            'paymentmethod_id'=>$request->paymentmethod,
            'registration_number'=>null,
            'status'=>'requested',
            'site'=>$site = $request->site,
            'payment_evidence_img'=>null,
            'payment_status'=>"belum lunas"
        ]);

        Alert::success('Congrats', 'Data pendaftaran kamu sudah terkirim, silahkan selesaikan pembayaran');
        return redirect()->route('toep');

    }

    public function toefl(Request $request)
    {
        $resp = $request->session()->all();

        $userid = $resp['user_id'];
        $userinfo = Userinfo::where('user_id',$userid)->first();
        $useridentity = UserIdentity::where('user_id',$userid)->first();
        return view("pages/mahasiswa/toefl", ["data"=>$userinfo, "useridentity"=>$useridentity]);
    }
    public function jlpt(Request $request)
    {
        $resp = $request->session()->all();

        $userid = $resp['user_id'];
        $userinfo = Userinfo::where('user_id',$userid)->first();
        $useridentity = UserIdentity::where('user_id',$userid)->first();
        return view("pages/mahasiswa/jlpt", ["data"=>$userinfo, "useridentity"=>$useridentity]);
    }
    public function ubipa(Request $request)
    {
        $resp = $request->session()->all();

        $userid = $resp['user_id'];
        $userinfo = Userinfo::where('user_id',$userid)->first();
        $useridentity = UserIdentity::where('user_id',$userid)->first();
        return view("pages/mahasiswa/ubipa", ["data"=>$userinfo, "useridentity"=>$useridentity]);
    }
    public function ielts(Request $request)
    {
        $resp = $request->session()->all();

        $userid = $resp['user_id'];
        $userinfo = Userinfo::where('user_id',$userid)->first();
        $useridentity = UserIdentity::where('user_id',$userid)->first();
        return view("pages/mahasiswa/ielts", ["data"=>$userinfo, "useridentity"=>$useridentity]);
    }
}
