<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CreateLeave;
use App\User;
class CreateLeaveController extends Controller
 {
      public function __construct()
      {
         $this->middleware('auth:api');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $createLeave = CreateLeave::latest()->paginate(20);
        // $createLeave = Auth::user('id')
        // // $invoice = Invoice::latest();
        return $createLeave;
    }
    // pending for super admin 
    public function getleavependingsuper()
    {
        $createLeave = CreateLeave::where(['isapprovedbysuperadmin' => null, 'isapprovedbyadmin' => 1])->get();
        return $createLeave;
    }
    // pending for admin 
    public function getleavependingadmin()
    {   
        $createLeave = CreateLeave::where(['isapprovedbyadmin' => null, 'isapprovedbyrecommender' => 1])->get();
        return $createLeave;
    }
    // approve leave req for super 
    public function getleaveapprovesuper()
    {
        $createLeave = CreateLeave::where('isapprovedbysuperadmin', 1)->get();
        return $createLeave;
    }
    // get approve leave req for admin 
    public function getleaveapproveadmin()
    {
        $createLeave = CreateLeave::where('isapprovedbyadmin', 1)->get();
        return $createLeave;
    }
    // get rejected leave req for super 
    public function getleaverejectsuper()
    {
        $createLeave = CreateLeave::where('isapprovedbysuperadmin', 0)->get();
        return $createLeave;
    }
    // get reject leave for admin 
    public function getleaverejectadmin()
    {
        $createLeave = CreateLeave::where('isapprovedbyadmin', 0)->get();
        return $createLeave;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return ['msg' => 'success'];
        return CreateLeave::create([
            'empname' => $request['empname'],
            'user_id' => auth('api')->user()->id,
            'empdepartment' => $request['empdepartment'],
            'empid' => $request['empid'],
            'empemail' => $request['empemail'],
            'leavetype' => $request['leavetype'],
            'startdate' => $request['startdate'],
            'enddate' => $request['enddate'],
            'available' => $request['available'],
            'totalleave' => $request['totalleave'],
            'recommenderDep' => $request['recommenderDep'],
            'recommender' => $request['recommender'],
            'recommenderEmail' => $request['recommenderEmail'],
            'duration' => $request['duration'],
            'address' => $request['address'],
            'reason' => $request['reason'],
            'reliever' => $request['reliever'],
            'relieverDep' => $request['relieverDep'],
            'relieverEmail' => $request['relieverEmail']
        ]);

        // 'empname', 'empdepartment', 'leavetype', 'startdate', 
        // 'enddate', 'available', 'totalleave', 'recommenderDep', 'recommender'
        // ,'duration', 'address','reason'
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leave = CreateLeave::where('id', $id)->get();
        return $leave;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }
    
    public function approvebyreliever($id)
    {
        $recommender = CreateLeave::findOrFail($id);
        $recommender->isapprovedbyreliever = 1;
        $recommender->save();
        return ['msg'=>'success'];

    }
    public function discurdbyreliever($id)
    {
        $recommender = CreateLeave::findOrFail($id);
        $recommender->isapprovedbyreliever = 0;
        $recommender->save();

    }
    public function approvebyrecommender($id)
    {
        $recommender = CreateLeave::findOrFail($id);
        $recommender->isapprovedbyrecommender = 1;
        $recommender->save();

    }
    public function discurdbyrecommender($id)
    {
        $recommender = CreateLeave::findOrFail($id);
        $recommender->isapprovedbyrecommender = 0;
        $recommender->save();

    }
    public function approvebyadmin($id)
    {
        $recommender = CreateLeave::findOrFail($id);
        $recommender->isapprovedbyadmin = 1;
        $recommender->save();

    }
    public function discurdbyadmin($id)
    {
        $recommender = CreateLeave::findOrFail($id);
        $recommender->isapprovedbyadmin = 0;
        $recommender->save();

    }
    public function approvebysuperadmin($id)
    {
        $recommender = CreateLeave::findOrFail($id);
        $recommender->isapprovedbysuperadmin = 1;
        $recommender->save();

    }
    public function discurdbysuperadmin($id)
    {
        $recommender = CreateLeave::findOrFail($id);
        $recommender->isapprovedbysuperadmin = 0;
        $recommender->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cl = CreateLeave::findOrFail($id);
        $cl->delete();
    }
    // public function getLeaveRel($email)
    // {
    //     return CreateLeave::where('email', $email)->get();
    // }
}
