<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductImageSeeder::class);
        $this->call(NewsSeeder::class);
    }
}
