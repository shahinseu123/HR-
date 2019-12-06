<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
class EmployeeController extends Controller
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
        return Employee::latest()->paginate(20);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'idno' => 'required|integer', 
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'designation' => 'required|string|max:191',
            'department' => 'required|string|max:191'
        ]);
        //   $request->all();

        return Employee::create([
            'idno' => $request['idno'],
            'name' => $request['name'],
            'email' => $request['email'],
            'designation' => $request['designation'],
            'department' => $request['department'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dep)
    {
        return Employee::where('department', $dep)->get();
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
        
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return ['msg' => 'Deleted'];
    }
    // public function getItemployee($dep)
    // {
    //    return Employee::where('department', $dep)->get();
    // }
}
