<?php

namespace App\Http\Controllers;

use App\Models\UserIdentity;
use App\Models\Userinfo;
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
        return view("pages/mahasiswa/toep", ["data"=>$userinfo, "useridentity"=>$useridentity]);
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
