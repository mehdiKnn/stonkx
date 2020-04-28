<?php

use Illuminate\Database\Seeder;
use App\Brand;


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
            $brand = new Brand();
            $brand->name = $obj->name;
            $brand->description = $obj->description;
            $brand->save();
        }
    }
}
