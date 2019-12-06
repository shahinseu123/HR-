<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'idno','name', 'email', 'designation', 'department'
    ];
}
