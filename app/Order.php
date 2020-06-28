<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }


    public function product(){
        return $this->belongsToMany('App\Product' , 'order_products', 'order_id', 'product_id' )->withPivot('id');
    }
}
