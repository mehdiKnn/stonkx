<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use PhpOption\LazyOption;

class AdminBrandController extends Controller
{
    public function index(Brand $brands)
    {

        return view('admin.brands.index', ['brands' => $brands->get()]);
    }

    public function show($id, Brand $brands)
    {
        return view('admin.brands.show', ['brands' => $brands->find($id)]);
    }

    public function delete($id, Brand $brands, Product $product, ProductImage $image)
    {
        $current = $brands->find($id);
        if ($current) {
            $current->delete();

            $productBrands = $product->where('brand_id', $id)->get();

            foreach ($productBrands as $product) {
                $product->delete();
                $productImage = $image->where('product_id', $product->$id)->get();
                foreach ($productImage as $image) {
                    $image->delete();
                }
            }


        }

        return redirect()->route('admin.brands.index');

    }

    public function create()
    {
        return view('admin.brands.show');
    }

    public function store(Brand $brand, Request $request)
    {
        $brand->name = $request->name;
        $brand->description = $request->description;

        try {
            $image_name = $request->file('logo')->getRealPath();
            Cloudder::upload($image_name, null, array("folder" => "Stonk/Brands/"));
            $image = Cloudder::getResult();
            $brand->image = $image['url'];

            $image_name = $request->file('banner')->getRealPath();
            Cloudder::upload($image_name, null, array("folder" => "Stonk/Brands/"));
            $image = Cloudder::getResult();
            $brand->banner = $image['url'];

            $brand->save();
            return redirect()->route('admin.news.index');
        } catch (\Throwable $e) {
            $request->session()->flash('notif', "Une erreur est survenue lors de l'enregistrement");
            return redirect()->back()->withInput();

        }
    }

    public function update($id,Brand $brand, Request $request){
        $current = $brand->find($id);

        $current->name = $request->name;
        $current->description = $request->description;
        if ($request->hasFile('logo')){
            $image_name = $request->file('logo')->getRealPath();
            Cloudder::upload($image_name, null, array("folder" => "Stonk/Brands/"));
            $image = Cloudder::getResult();
            $current->image = $image['url'];
        }
        if ($request->hasFile('banner')){
            $image_name = $request->file('banner')->getRealPath();
            Cloudder::upload($image_name, null, array("folder" => "Stonk/Brands/"));
            $image = Cloudder::getResult();
            $current->banner = $image['url'];
        }
        try {
            $current->save();
            return redirect()->route('admin.brands.index');
        } catch (\Throwable $e) {
            $request->session()->flash('notif', "Une erreur est survenue lors de la modification");
            return redirect()->back()->withInput();
        }

    }
}
