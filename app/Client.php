<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Client extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    
    public static function boot(){
        parent::boot();
    
        static::saving(function ($instance){
            $instance->user = Auth::user()->id;
        });
       
    }

    public function status() {
        return $this->belongsTo('App\Status');
    }


}
