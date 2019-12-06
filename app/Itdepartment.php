<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itdepartment extends Model
{
    protected $fillable = [
        'idno','name', 'email', 'designation', 'department'
    ];
}
