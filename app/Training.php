<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
      'empid', 'name', 'department', 'startdate','enddate','trainingon', 'trainingtype','remark'
    ];
        // empid: '',
        // name: '',
        // department: '',
        // startdate: '',
        // enddate: '',
        // trainingon: '',
        // trainingtype: '',
        // remark: ''
}
