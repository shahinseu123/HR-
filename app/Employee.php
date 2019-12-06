<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'idno','name', 'email', 'designation', 'department'
    ];
}
