<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

           User::create([
    'name' => 'Mohamed Ramadan',
    'email' => 'moh7medramadan@gmail.com',
    'password' => Hash::make('123456789'),
]);
       // Product::factory(10)->create();
    }
}
