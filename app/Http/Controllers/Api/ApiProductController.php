<?php

namespace App\Http\Controllers\Api;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index(Product $product, Brand $brand){
        $return = (object)[
            'error' => null,
            'products' => []
        ];

        try {
            $productList =  $product->orderBy('id', 'DESC')->get();
            foreach ($productList as $products) {
                $products->brand_id = $brand->find($products->brand_id)->name;
                $products->img = $products->image[0]->name;
            }

            $return->products = $productList;
        } catch (QueryException $e) {
            $return->error = $e;
        }
        return response()->json($return);
    }

    public function show(Product $product, $id)
    {
        $return = (object)[
            'error' => null,
            'product' => []
        ];

        try {
            $return->product = $product->findOrFail($id);
            return response()->json($return, 200);
        } catch (ModelNotFoundException $e) {
            $return->error = "Cet identifiant est inconnu";
            return response()->json($return, 404);
        }
    }

    public function research($sample,Product $product, Request $request, Brand $brand){
        $return = (object)[
            'error' => null,
            'products' => []
        ];
        try {
            $productList =  $product->whereRaw("name LIKE '".$sample."%'")->get();
            foreach ($productList as $products) {
                $products->brand_id = $brand->find($products->brand_id)->name;
                $products->img = $products->image[0]->name;
            }

            $return->products = $productList;
        } catch (QueryException $e) {
            $return->error = $e;
        }
        return response()->json($return);


    }
}
