<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreUser extends Model
{
    public $table = "score_users";
    use HasFactory;
    protected $fillable = [
        'nomor_peserta',
        'nama',
        'total_score',
        'a',
        'b',
        'c',
        'd',
        'e',
    ];
}
