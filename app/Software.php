<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $fillable = [
        'idno','name', 'email', 'designation', 'department'
    ];
}
