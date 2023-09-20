<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'kudriashova.ag@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'not admin',
            'email' => 'kudriashova.ag2@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        // Category::factory()->create([
        //     'name'=>'First',
        //     'description'=>'Description First'
        // ]);

        // Category::factory(10)->create();
        Category::factory(10)->has(Product::factory()->count(3))->create();

    }
}
