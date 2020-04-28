<?php

use Illuminate\Database\Seeder;
use App\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/image.json");
        $data = json_decode($json);
        foreach ($data as $obj){
            $image = new ProductImage();
            $image->product_id = $obj->product_id;
            $image->name = $obj->name;
            $image->save();
        }
    }
}
