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

        foreach ($data as $obj) {
            Cloudder::upload(storage_path("images/sneakers/" . $obj->name),null,array("folder"=>"Stonk/Products/"));
            $banner = Cloudder::getResult();
            $image = new ProductImage();
            $image->product_id = $obj->product_id;
            $image->name = $banner['url'];
            $image->save();
        }
    }
}
