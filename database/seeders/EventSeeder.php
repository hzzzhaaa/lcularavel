<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            ['event_name' => 'TOEP', 'type' => 'Reguler', 'test_based' => 'PBT', 'desc' => 'Sesuai dengan kalendar jadwal TOEP UNJ Reguler.'],
            ['event_name' => 'TOEP', 'type' => 'Reguler', 'test_based' => 'CBT', 'desc' => 'Sesuai dengan kalendar jadwal TOEP UNJ Reguler.'],
            ['event_name' => 'TOEP', 'type' => 'Ekspres', 'test_based' => 'CBT', 'desc' => 'Setiap hari kerja dalam jangka waktu pukul 08.00-13.00 WIB.'],
            ['event_name' => 'TOEP', 'type' => 'Ekspres', 'test_based' => 'PBT', 'desc' => 'Setiap hari kerja dalam jangka waktu pukul 08.00-13.00 WIB.'],
        ];

        Event::insert($users);
    }
}
