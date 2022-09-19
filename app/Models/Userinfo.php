<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    public $table = "userinfos";
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telp',
        'jenis_kelamin',
        'kewarganegaraan',
        'nim',
        'prodi',
        'jenjang',
        'angkatan',
    ];
}
