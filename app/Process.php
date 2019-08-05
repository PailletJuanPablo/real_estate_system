<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{

    protected $fillable = ['aclarations', 'client_id', 'property_id', 'user_id'];
    
    public function property() {
        return $this->belongsTo('App\Property');
    }

    public function client() {
        return $this->belongsTo('App\Client');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
