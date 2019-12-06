<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSchedule extends Model
{
    protected $fillable = [
        'empid', 'name', 'department','schedulefrom','scheduleto'
    ];
}
// empid: '',
// name: '',
// department: '',
// shedulefrom: '',
// sheduleto: ''