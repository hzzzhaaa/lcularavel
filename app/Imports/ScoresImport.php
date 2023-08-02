<?php

namespace App\Imports;

use App\Models\ScoreUser;
use Maatwebsite\Excel\Concerns\ToModel;

class ScoresImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd($row);
        return new ScoreUser([
            'registration_id' => $row[1],
            'nomor_peserta' => $row[2],
            'nama' => $row[3],
            'total_score'=>$row[4],
            'a' => $row[5],
            'b' => $row[6],
            'c' => $row[7],
            'd' => $row[8],
            'e' => $row[9],
        ]);
    }
}
