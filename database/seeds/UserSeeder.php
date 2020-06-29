<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@mail.fr";
        $user->password = Hash::make("admin123");
        $user->address = "default admin";
        $user->admin = 1;
        $user->save();

    }
}
