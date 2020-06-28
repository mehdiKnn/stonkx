<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Brand extends Model
{
    use HasTrixRichText;

    protected  $fillable = [
        'name',
        'description'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
