<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'idno','name', 'email', 'designation', 'department'
    ];
}
