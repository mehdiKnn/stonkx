<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/sneakers.json");
        $data = json_decode($json);
        foreach ($data as $obj){
            $product = new Product();
            $product->name = $obj->name;
            $product->description = $obj->description;
            $product->price = $obj->price;
            $product->color = $obj->color;
            $product->active = $obj->active;
            $product->brand_id=$obj->brand_id;
            $product->save();
        }
    }
}
