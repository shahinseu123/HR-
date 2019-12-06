<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Invoice;

class InvoiceController extends Controller
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
        $invoice = Invoice::with('invoice_products')->get();
        // $invoice = Invoice::latest();
        return $invoice;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Invoice::create([
            'user_id' => auth('api')->user()->id,
            'customer' => $request['customer'],
            'currency' => $request['currency'],
            'invoicedate' => $request['invoicedate'],
            'duedate' => $request['duedate'],
            'invoicenumber' => $request['invoicenumber'],
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
         // $invoice = Invoice::where('id', $id)->first();
         $invoice = Invoice::where('id', $id)->with('invoice_products')->get();
         return $invoice;
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
        //
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
