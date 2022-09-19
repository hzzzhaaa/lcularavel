<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventSchedule;
use Alert;
use App\Http\Resources\EventScheduleResource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/admin/dashboard');
    }

    public function toep()
    {
        $eventschedule = EventSchedule::whereIn('event_id',[1,2,3,4])->get();
        $eventschedule = json_decode($eventschedule);
        $format1 = 'Y-m-d';
        $format2 = 'H:i:s';
        foreach($eventschedule as $r){
            $r->event_id = Event::find($r->id);
            $temp = explode(" ",$r->date);
            $r->date = $temp[0];
            $r->time = $temp[1];
            // dd($r->time);
            // $r->date = Carbon::parse($r->date)->format($format1);
            // $r->time = Carbon::parse($r->date)->format($format2);
            // dd();
        }
        // $eventresource = EventScheduleResource::collection($eventschedule);
        // return $eventresource->event_id;
        // dd($eventschedule);

        return view('pages/admin/toep',['data'=>$eventschedule]);
    }

    public function buatJadwalToep(Request $request)
    {
        $eventid = $request->eventid;
        $eventname = Event::where('id',$eventid)->get('event_name');
        $eventname = json_decode($eventname['0']);
        $date = $request->date;
        $max = $request->maxparticipant;
        $link = $request->link;

        $u = EventSchedule::create([
           'event_id'=>$eventid,
           'event_name'=>$eventname->event_name,
           'date'=>$date,
           'max_participant'=>$max,
           'current_participant'=>0,
           'link_zoom'=>$link
        ]);

        Alert::success('Berhasil', 'Menambahkan Jadwal Baru');
        return redirect("/admin/toep");
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
