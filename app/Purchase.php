<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'vendor', 'currency', 'purchasedate', 'duedate',
        'purchasenumber','ordernumber','subtotal','tax','total',
        'details','user_id','isapprovedbyadmin', 'isapprovedbysuperadmin'
    ];
    
    public function purchase_products(){
        return $this->hasMany('App\PurchaseProduct');
        // return $this->hasMany(InvoiceProduct::class)
    }

    public function user(){
        return $this->belongsTo('App\user');
    }
}
