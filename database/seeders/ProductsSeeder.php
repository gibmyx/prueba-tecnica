<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => "Producto 1",
                'price' => 123.45,
                'tax' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Producto 2",
                'price' => 45.65,
                'tax' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Producto 3",
                'price' => 39.73,
                'tax' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Producto 4",
                'price' => 250.00,
                'tax' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Producto 5",
                'price' => 59.35,
                'tax' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
