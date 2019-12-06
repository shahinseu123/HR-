<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Marketing;

class MarketingController extends Controller
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
        return Marketing::latest()->paginate(20);
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
            // 'idno' => 'required|integer', 
            'name' => 'required|string|max:191',
            // 'email' => 'required|string|email|max:191',
            // 'designation' => 'required|string|max:191',
            // 'department' => 'required|string|max:191'
        ]);
        //   $request->all();

        return Marketing::create([
            // 'idno' => $request['idno'],
            'name' => $request['name'],
        //     'email' => $request['email'],
        //     'designation' => $request['designation'],
        //     'department' => $request['department'],
         ]);
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
        $mar = Marketing::findOrFail($id);
        $mar->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mar = Marketing::findOrFail($id);
        $mar->delete();
        return ['msg' => 'Deleted'];
    }
}
