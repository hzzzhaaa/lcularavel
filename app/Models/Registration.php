<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public $table = "registration";
    use HasFactory;
    protected $fillable = [
        'user_id',
        'event_id',
        'event_name',
        'schedule_id',
        'paymentmethod_id',
        'status',
        'site',
        'payment_evidence_img',
        'payment_status',
    ];
}
