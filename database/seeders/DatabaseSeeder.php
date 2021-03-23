<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'SimonAdmin',
            'email' => 'simon@admin.com',
            'password' => bcrypt('password'),
            'email_verified_at' => NOW(),
            'address' => 'France',
            'phone_number' => '0601020304',
            'is_admin' => 1
        ]);
        User::create([
            'name' => 'JohnDoe',
            'email' => 'john@doe.com',
            'password' => bcrypt('password'),
            'email_verified_at' => NOW(),
            'address' => 'America',
            'phone_number' => '0609080706',
            'is_admin' => 0
        ]);
    }
}