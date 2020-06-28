<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class AdminProductController extends Controller
{
    public function index(Product $products)
    {

        return view('admin.products.index', ['products' => $products->paginate(12)]);
    }

    public function show($id, Product $products, Brand $brand)
    {
        return view('admin.products.show', ['products' => $products->find($id), 'brands' => $brand->get()]);
    }

    public function delete($id, Product $product, ProductImage $image)
    {
        $current = $product->find($id);
        if ($current) {
            $current->delete();

            $productImage = $image->where('product_id', $product->$id)->get();
            foreach ($productImage as $image) {
                $image->delete();
            }
        }

        return redirect()->route('admin.products.index');

    }

    public function create(Brand $brands)
    {
        return view('admin.products.show', ['brands' => $brands->get()]);
    }

    public function store(Product $product, ProductImage $productImage, Request $request)
    {

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->color = $request->color;
        $product->brand_id = $request->brand;
        $product->active = 1;


        try {
            $product->save();

            for ($i = 1; $i <= 3; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $image_name = $request->file('image' . $i)->getRealPath();
                    Cloudder::upload($image_name, null, array("folder" => "Stonk/Products/"));
                    $image = Cloudder::getResult();
                    $productImage->product_id = $product->id;
                    $productImage->name = $image['url'];
                    $productImage->save();
                }
            }


            return redirect()->route('admin.products.index');
        } catch (\Throwable $e) {
            $request->session()->flash('notif', "Une erreur est survenue lors de l'enregistrement");
            return redirect()->back()->withInput();

        }
    }

    public function update($id, Product $product, ProductImage $productImage, Request $request)
    {

        $current = $product->find($id);

        $current->name = $request->name;
        $current->description = $request->description;
        $current->price = $request->price;
        $current->color = $request->color;
        $current->brand_id = $request->brand;
        $current->active = 1;

        try {
            $current->save();
            for ($i = 1; $i <= 3; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $image_name = $request->file('image' . $i)->getRealPath();
                    Cloudder::upload($image_name, null, array("folder" => "Stonk/Products/"));
                    $image = Cloudder::getResult();
                    $productImage->product_id = $current->id;
                    $productImage->name = $image['url'];
                    $productImage->save();
                }
            }


            return redirect()->route('admin.products.index');
        } catch (\Throwable $e) {
            $request->session()->flash('notif', "Une erreur est survenue lors de la modification");
            return redirect()->back()->withInput();

        }
    }
}
