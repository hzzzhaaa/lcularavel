<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public $table = "paymentmethod";
    use HasFactory;
    protected $fillable = [
        'bank_name',
        'account_number',
    ];

}
