<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public function product_type(){
        return $this->belongsTo('App\Product_Type','id_type','id');
    }

    public function bill_details(){
        return $this->hasMany('App\BillDetail','id_product','id');
    }
}
