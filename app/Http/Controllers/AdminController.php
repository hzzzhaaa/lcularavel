<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\UserIdentity;
use App\Models\EventSchedule;
use App\Models\Userinfo;
use App\Models\PaymentMethod;
use App\Models\Registration;
use App\Models\ScoreUser;
use Alert;
use App\Http\Resources\EventScheduleResource;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use setasign\Fpdi\Fpdi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;
use App\Imports\ScoresImport;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resp = $request->session()->all();
        // $resp = $resp['nama'];
        // dd($resp);
        return view('pages/admin/dashboard',["data"=>$resp]);
    }

    public function paymentMethod()
    {
        $paymentmethod = PaymentMethod::all();
        return view('pages/admin/paymentmethod',["data"=>$paymentmethod]);
    }

    public function _paymentMethod(Request $request)
    {
        $nama = $request->nama;
        $norek = $request->norek;

        $u = PaymentMethod::create([
            'bank_name'=>$nama,
            'account_number'=>$norek
        ]);


        Alert::success('Congrats', 'Berhasil menambahkan metode bayar');
        return redirect()->route('admin.paymentmethod');

    }

    public function verifktp()
    {
        $useridentity = UserIdentity::where("status","Requested")->get();
        $useridentity = json_decode($useridentity);
        // dd($useridentity);
        foreach($useridentity as $ktp)
        {
            $ktp->user_id = Userinfo::where("user_id",$ktp->user_id)->first();
            $ktp->user_id = json_decode($ktp->user_id);
        }
        // dd($useridentity);
        return view('pages/admin/verifktp',["data"=>$useridentity]);
    }

    public function _verifktp($id)
    {
        $ktp = UserIdentity::where("id",$id)->update([
            'status'=>'verified'
        ]);

        Alert::success('Congrats', 'KTP User Sudah Terverifikasi');
        return redirect()->route('verif.ktp');

    }

    public function toep()
    {
        $verif = Registration::where("status","uploaded")->get()->count();
        $eventschedule = EventSchedule::whereIn('event_id',[1,2,3,4])->get();
        // $eventschedule = json_decode($eventschedule);
        $format1 = 'Y-m-d';
        $format2 = 'H:i:s';
        foreach($eventschedule as $r){
            $r->event_id = Event::where("id",$r->event_id)->first();
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
        // $eventschedule = json_decode($eventschedule);
        // dd($eventschedule);

        return view('pages/admin/toep/toep',['data'=>$eventschedule,"verifcount"=>$verif]);
    }

    public function listPesertaToep($id)
    {
        $list = Registration::where("schedule_id",$id)->get();
        foreach($list as $l)
        {
            $l->user_id = User::where("id",$l->user_id)->first();
            $l->event_id = Event::where("id",$l->event_id)->first();
        }
        // $list = json_decode($list);
        // dd($id);
        return view('pages/admin/toep/jadwaltoep',['data'=>$list,"id"=>$id]);
    }

    public function loginadmin()
    {
        return view('pages/admin/loginadmin');
    }

    public function _loginadmin(Request $request)
    {
        // dd($request);
        $username = $request->username;
        $password = $request->password;

        $ttl = auth('api')->factory()->getTTL();
        $token = auth('api')->setTTL($ttl)->attempt(['username'=>$username, 'password' => $password]);

        $request->session()->put("nama", "adminlcu");
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
                return redirect()->route('dashboard');
            }
    }
    public function logoutadmin(Request $request)
    {
        $request->session()->flush();


        return redirect()->route('loginadmin');
    }

    public function exportexcel($id)
    {
        return (new ExportExcel($id))->download('contoh1.xlsx');
        // Alert::success('Congrats', 'Excel Telah Terdownload');
        // return redirect()->route('list.peserta.toep',[$id]);
    }

    public function importExcel($id, Request $request)
    {
        // dd($request->import);
        // $import = new ScoreImport, request()->file('import');
        $file = $request->file('import');
        // dd($file);

		$nama_file = 'Hasil_Peserta'.$id.'.'.'xlsx';

		// $file = $file->move('../public/excel/excel_hasil/',$nama_file);
        $uploadedExcel = $request->import->move(public_path('excel/excel_hasil'), $nama_file);
        // // dd($file);
        // // $array = Excel::toArray(new ScoresImport, $file);
        // dd($array);
        // dd(public_path('excel\excel_hasil', $nama_file));

        $array = Excel::toArray(new ScoresImport,$nama_file,ExcelExcel::XLSX);
        $array = $array[0];
        unset($array[0]);

        // dd($array);
        foreach ($array as $key => $a)
        {
            unset($a[0]);
            //  dd();
             if($a[$key] !== null){
            $u = ScoreUser::create([
                'nomor_peserta'=>$a[1],
                'nama'=>$a[2],
                'total_score'=>$a[3],
                'a'=>$a[4],
                'b'=>$a[5],
                'c'=>$a[6],
                'd'=>$a[7],
                'e'=>$a[8],
            ]);
        }
        }


        //dd(array_shift($array));
        // $array1 = [];

        // foreach($array as $key=>$value){

        //     $array1 = $value;
        //     //dd($value[$key+=1]);
        // }
        // unset($array1[0]);
        // dd($array1);
        // for ($i=$array;$i=0;$i++){

        //     dd($i);
        // }
       // dd($array);

        // $u = ScoreUser::create([
        //     'registration_id',
            // 'nomor_peserta',
            // 'nama',
            // 'total_score',
            // 'a',
            // 'b',
            // 'c',
            // 'd',
            // 'e',
        // ]);
        Alert::success('Congrats', 'Hasil Ujian Berhasil diunggah');
        return redirect()->route('list.peserta.toep', $id);
    }

    public function sertifikat($id, $registration_number, Request $request)
    {
        // $regis = $request->registrationNumber;
        $schedule = EventSchedule::where('id',$id)->first();
        $scoreuser = ScoreUser::where('nomor_peserta',$registration_number)->first();
        $regis = Registration::where('registration_number',$registration_number)->first();
        $user_id = $regis->user_id;
        $user = Userinfo::where('user_id',$user_id)->first();
        $sex = "";
        $certificate_number = "";
        if($scoreuser->certificatae_number==null){
            $certificate_number = "0" . rand(1000,9999) . "/UN39 19/TEPUNJ/2023";

            $update = ScoreUser::where("nomor_peserta",$registration_number)->update([
                'certificate_number'=>$certificate_number
            ]);
        }else{
            $certificate_number = $scoreuser->certificate_number;
        }

        if($user->jenis_kelamin == "L")
        {
            $sex = "M";
        }else {
            $sex = "F";
        }
        // dd(json_decode($schedule));
        // dd(json_decode($scoreuser));
        $data = [
            "nama" => $scoreuser->nama,
            "Tanggal_lahir" => $user->tanggal_lahir,
            "Certificate_number" => $certificate_number,
            "sex" => $sex,
            "Nomor_Peserta" => $scoreuser->nomor_peserta,
            "schedule" => $schedule->date,
            "Total_Score" => $scoreuser->total_score,
            "Listening" => $scoreuser->a,
            "Writting" => $scoreuser->b,
            "Reading" => $scoreuser->c
        ];
        // dd($data);
        $filePath = public_path("img/SERTIFIKAT.pdf");
        $outputFilePath = public_path("img/sample_output.pdf");
        $this->generateCertificate($filePath, $outputFilePath, $data);

        return response()->file($outputFilePath);
    }

    public function generateCertificate($file, $outputFilePath, $data)
    {
        // dd($request->registrationNumber);
        $fpdi = new FPDI;
        // dd($data["nama"]);

        $count = $fpdi->setSourceFile($file);

        for ($i=1; $i<=$count; $i++) {

            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);

            $fpdi->SetFont("helvetica", "", 20);
            $fpdi->SetTextColor(0,0,0);

            $left = 180;
            $top = 217.8;
            $text = $data["nama"];
            $fpdi->Text($left,$top,$text);

            $left3 = 180;
            $top3 = 231.8;
            $text3 = $data["Tanggal_lahir"];
            $fpdi->Text($left3,$top3,$text3);

            $left9 = 283;
            $top9 = 231.5;
            $text9 = $data["sex"];
            $fpdi->Text($left9,$top9,$text9);

            $left4 = 180;
            $top4 = 246;
            $text4 = $data["Certificate_number"];
            $fpdi->Text($left4,$top4,$text4);

            $left5 = 180;
            $top5 = 260;
            $text5 = $data["Nomor_Peserta"];
            $fpdi->Text($left5,$top5,$text5);

            $left6 = 180;
            $top6 = 275;
            $text6 = $data["schedule"];
            $fpdi->Text($left6,$top6,$text6);

            $left7 = 180;
            $top7 = 298.5;
            $text7 = $data["Total_Score"];
            $fpdi->Text($left7,$top7,$text7);

            $left1 = 180;
            $top1 = 312.5;
            $text1 = $data["Listening"];
            $fpdi->Text($left1,$top1,$text1);

            $left2 = 180;
            $top2 = 326.5;
            $text2 = $data["Writting"];
            $fpdi->Text($left2,$top2,$text2);

            $left8 = 180;
            $top8 = 340.5;
            $text8 = $data["Reading"];
            $fpdi->Text($left8,$top8,$text8);

            // $fpdi->Image(public_path("img/qr/qrtest.png"), 215, 20);
        }

        return $fpdi->Output($outputFilePath, 'F');

        // $pdf = Pdf::loadView('pages/admin/toep/sertifikat', $data);
        // $pdf->loadHTML('<center><img class="img" src="D:\kuliah\skripsi\lcularavel\public\img\SERTIFIKAT.png" alt="" height="1030" width="775"></center>');
        // return $pdf->stream();
    }

    public function verifbayartoep()
    {
        $list = Registration::where("event_name","TOEP")
                            ->where("status","uploaded")->get();


        foreach ($list as $l){
            $l->user_id = User::where("id",$l->user_id)->first("name");
            $l->event_id = Event::where("id",$l->event_id)->first();
            $l->paymentmethod_id = PaymentMethod::where("id",$l->paymentmethod_id)->first();
        }
        // $list = json_decode($list);
        // dd($list);


        return view('pages/admin/toep/verifbayar',["data"=>$list]);
    }

    public function verifbuktitoep($id)
    {
        $regis = Registration::where("id",$id)->update([
            'status'=>'verified'
        ]);
        Alert::success('Congrats', 'Bukti Bayar Telah Terverifikasi');
        return redirect()->route('admin.verifbayartoep');
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
