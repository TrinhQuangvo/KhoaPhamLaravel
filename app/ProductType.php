<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $table = "type_products";
    //mqh 1 nhiều 
    public function product(){
        // tham soos thứ 1 là đường dẫn tới model sản phẩm
        // tham số thứ 2 là khóa ngoại 
        // tham số thứ 3 là khóa chính
        return $this->hasMany('App\Product','id_type','id');
    }
}
