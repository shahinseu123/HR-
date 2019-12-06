<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateLeave extends Model
{
    protected $fillable = [
       'empname', 'empdepartment', 'leavetype', 'startdate', 
       'enddate', 'available', 'totalleave', 'recommenderDep', 'recommender'
       ,'duration', 'address','reason','reliever','relieverDep', 'user_id',
       'isapprovedbyadmin', 'isapprovedbysuperadmin','empid', 'empemail','relieverEmail','recommenderEmail',
       'isapprovedbyreliever','isapprovedbyrecommender'
    ];
   
    // protected $with = ['user'];
    // protected $with = ['user:id,name'];


    public function user(){
        return $this->belongsTo('App\User');
    }

}
