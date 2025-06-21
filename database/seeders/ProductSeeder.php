<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Laptop Dell Inspiron 15',
            'price' => 15000000,
            'image' => '/dashboardcss/img/product-1.jpg'
        ]);

        Product::create([
            'name' => 'MacBook Air M2 2023',
            'price' => 28000000,
            'image' => '/dashboardcss/img/product-2.jpg'
        ]);

        Product::create([
            'name' => 'Asus ROG Strix G15',
            'price' => 32000000,
            'image' => '/dashboardcss/img/product-3.jpg'
        ]);
    }
}
