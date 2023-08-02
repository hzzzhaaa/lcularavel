<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdentity extends Model
{
    public $table = "user_identity";
    use HasFactory;
    protected $fillable = [
        'user_id',
        'img_info',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
