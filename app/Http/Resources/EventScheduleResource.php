<?php

namespace App\Http\Resources;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EventScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $event = Event::find($this->event_id);
        $datetime = $this->date;
        $format1 = 'Y-m-d';
        $format2 = 'H:i:s';
        $date = Carbon::parse($datetime)->format($format1);
        $time = Carbon::parse($datetime)->format($format2);
        dd($event);

        return[
            'id'=>$this->id,
            'event_id'=>$event,
            'date'=>$date,
            'time'=>$time,
            'max_participant'=>$this->max_participant,
            'current_participant'=>$this->current_participant,
            'link_zoom'=>$this->link_zoom,
            'status'=>$this->status,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
