<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Product $product, News $new)
    {
        return view('welcome', ['products' => $product->get()->random(12)]);
    }
}
