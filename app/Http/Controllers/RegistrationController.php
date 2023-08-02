<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userinfo;
use App\Models\UserIdentity;
use App\Models\Registration;
use App\Models\Event;
use App\Models\EventSchedule;
use App\Models\PaymentMethod;
use Auth;
use Alert;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function pilihjadwal($id,$schedule_id)
    {
        // dd($schedule_id);
        $count = EventSchedule::where("id",$schedule_id)->first();
        $count = $count->current_participant;

        $pad = "000";
        $jadwal = Registration::where("id",$id)->first();
        $jadwal = json_decode($jadwal);
        // dd($jadwal);
        $register_id = $jadwal->user_id;
        if (strlen($register_id) < strlen($pad)) {
            $register_id = substr($pad, 0, (strlen($pad) - strlen($register_id))) . $register_id;
        }

        $regnumber = null;
        if($jadwal->event_name=="TOEP")
        {   if($jadwal->event_id==1){
                $regnumber = "P20";
            }elseif($jadwal->event_id==2){
                $regnumber = "C20";
            }elseif($jadwal->event_id==3){
                $regnumber = "C21";
            }elseif($jadwal->event_id==4){
                $regnumber = "P21";
            }

        }elseif($jadwal->event_name=="TOEFL"){

        }elseif($jadwal->event_name=="JLPT"){

        }elseif($jadwal->event_name=="UBIPA"){

        }elseif($jadwal->event_name=="IELTS"){

        }
        $regnumber = $regnumber . $schedule_id . $register_id;
        // dd($regnumber);
        $schedule = Registration::where("id",$id)->update([
            "schedule_id"=>$schedule_id,
            "registration_number"=>$regnumber,
            "status"=>"registered"
        ]);
        $c = EventSchedule::where("id",$schedule_id)->update([
            "current_participant"=>$count+=1
        ]);

        Alert::success('Congrats', 'Berhasil Pilih Jadwal');
        return redirect()->route('schedule');
    }
    public function uploadbukti(Request $request,$id)
    {
        // dd($id);
        $bukti = $request->bukti;
        $resp = $request->session()->all();
        $userid = $resp['user_id'];
        $imageName = 'buktibayar'.$userid.'.'.$id.'.'.'jpg';
        $uploadedImage = $bukti->move(public_path('img/buktibayar_user'), $imageName);
        $imagePath = 'img/buktibayar_user/' . $imageName;
        $u = Registration::where("id",$id)->update([
            "status"=>"uploaded",
            "payment_evidence_img"=>$imagePath
        ]);
        Alert::success('Congrats', 'bukti bayar berhasil diunggah');
        return redirect()->route('schedule');
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
