<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Training;

class TrainingController extends Controller
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
        return Training::latest()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|String|max:300',
             ]);
        return Training::create([
            'empid' => $request['empid'],
            'name' => $request['name'],
            'department' => $request['department'],
            'startdate' => $request['startdate'],
            'enddate' => $request['enddate'],
            'trainingon' => $request['trainingon'],
            'trainingtype' => $request['trainingtype'],
            'remark' => $request['remark']
        ]);
        // empid: '',
        // name: '',
        // department: '',
        // startdate: '',
        // enddate: '',
        // trainingon: '',
        // trainingtype: '',
        // remark: ''
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $training = Training::findOrFail($id);
        $training->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();
    }
}
