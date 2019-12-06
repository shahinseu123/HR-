<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
{
    protected $fillable = [
        'productname','quantity','price','tax','linetotal','purchase_id'
    ];

    public function purchase(){
        return $this->belongsTo('App\Purchase');
        // return $this->belongsTo(Invoice::class);
    }
}
