<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function image(){
        return $this->hasMany(ProductImage::class);
    }
}
