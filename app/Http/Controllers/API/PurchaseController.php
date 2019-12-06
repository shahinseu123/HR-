<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Purchase;

class PurchaseController extends Controller
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
        $purchase = Purchase::with('purchase_products')->get();
        // $invoice = Invoice::latest();
        return $purchase;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Purchase::create([
            'user_id' => auth('api')->user()->id,
            'vendor' => $request['vendor'],
            'currency' => $request['currency'],
            'purchasedate' => $request['purchasedate'],
            'duedate' => $request['duedate'],
            'purchasenumber' => $request['purchasenumber'],
            'ordernumber' => $request['ordernumber'],
            'subtotal' => $request['subtotal'],
            'tax' => $request['tax'],
            'total' => $request['total'],
            'details' => $request['details'],
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
        // $invoice = Invoice::where('id', $id)->first();
        $purchase = Purchase::where('id', $id)->with('purchase_products')->get();
        return $purchase;
        // return ['msg' => 'success'];
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
