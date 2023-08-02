<?php

namespace App\Exports;

use App\Models\Registration;
use App\Models\User;
use App\Models\EventSchedule;
use App\Models\Event;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportExcel implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($id)
    {
        $this->id = $id;
    }

    // public function forId($id)
    // {
    //     $this->id = $id;
    //     return $this;
    // }

    public function query()
    {
        return Registration::query()->where('schedule_id',$this->id);
    }

    // public function collection($id)
    // {
    //     return Registration::where("schedule_id",$id)->get();
    // }

    /**
    * var Registration $registration
    */
    public function map($registration): array
    {
        // $schedule_id = $registration->schedule_id;
        // $registration = Registration::where("schedule_id",$schedule_id)->get();
        // $registration = json_decode($registration);
        // dd($registration);
        $registration->user_id = User::where("id",$registration->user_id)->first();
        $registration->schedule_id = EventSchedule::where("id",$registration->schedule_id)->first();
        $registration->schedule_id->event_id = Event::where("id",$registration->schedule_id->event_id)->first();
        $registration->kelompok =$registration->schedule_id->event_name . " "
        . $registration->schedule_id->event_id->type . " "
        . $registration->schedule_id->event_id->test_based . " "
        . $registration->schedule_id->date;

        return [
            [
                $registration->registration_number,
                $registration->user_id->name,
                $registration->kelompok,
                $registration->user_id->email,
            ]
            ];

        // dd($export);


        return $export;

    }
    public function headings(): array
        {
            return [
                'NOMOR PESERTA',
                'NAMA PESERTA',
                'KELOMPOK UJIAN',
                'EMAIL (BILA ADA)',
                'KODE AKSES (BILA PERLU)',
                'TAGS (BILA PERLU)'
            ];
        }
}
