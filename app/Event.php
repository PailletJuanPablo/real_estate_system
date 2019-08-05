<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Event extends Model
{
    use SoftDeletes;

    public static function boot(){
        parent::boot();
    
        static::saving(function ($instance){
            $instance->user_id = Auth::user()->id;
        });
    }

    public function type() {
        return $this->belongsTo('App\EventType', 'event_type_id');
    }
    public function property() {
        return $this->belongsTo('App\Property');
    }
    public function client() {
        return $this->belongsTo('App\Client');
    }


    protected $fillable = [
        'schedule', 'description', 'client_id', 'event_type_id', 'schedule_type_id', 'property_id'
    ];

    public function date_at() {
        return Carbon::parse($this['schedule'])->format('d/m/Y');
    }

    public function time_at() {
        return  Carbon::parse($this['schedule'])->format('H:i');
    }

}
