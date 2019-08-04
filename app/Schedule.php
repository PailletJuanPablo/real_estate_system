<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    protected $fillable = [
    'at', 'title', 'property_id', 'client_id', 'schedule_type_id', 'confirmed'
    ];

    public function type() {
        return $this->belongsTo('App\ScheduleType', 'schedule_type_id');
    }
    public function property() {
        return $this->belongsTo('App\Property');
    }
    public function client() {
        return $this->belongsTo('App\Client');
    }

    public function date_at() {
        return Carbon::parse($this['at'])->format('d/m/Y');
    }

    public function time_at() {
        return  Carbon::parse($this['at'])->format('H:i');
    }

}
