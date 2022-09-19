<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'event_name',
        'date',
        'max_participant',
        'current_participant',
        'link_zoom',
        'status'
    ];
}
