<?php

use Illuminate\Database\Seeder;
use App\Brand;
use JD\Cloudder\Facades\Cloudder;


class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @param Brand $brand
     * @return void
     */
    public function run()
    {

        $json = File::get("database/data/brands.json");
        $data = json_decode($json);
        foreach ($data as $obj){
            Cloudder::upload(storage_path("images/brand/".$obj->banner));
            $banner = Cloudder::getResult();
            Cloudder::upload(storage_path("images/brand/".$obj->image));
            $image = Cloudder::getResult();
            $brand = new Brand();
            $brand->name = $obj->name;
            $brand->description = $obj->description;
            $brand->banner = $banner['url'];
            $brand->image = $image['url'];
            $brand->save();
        }
    }
}
