<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'customer', 'currency', 'invoicedate', 'duedate',
        'invoicenumber','ordernumber','subtotal','tax','total',
        'details','user_id','isapprovedbyadmin', 'isapprovedbysuperadmin'
    ];
    
    public function invoice_products(){
        return $this->hasMany('App\InvoiceProduct');
        // return $this->hasMany(InvoiceProduct::class)
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
