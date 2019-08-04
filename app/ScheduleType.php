<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleType extends Model
{
    protected $table = 'schedules_types';
    protected $guarded = ['id', 'created_at', 'updated_at'];

}
