<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Lấy tất cả sản phẩm từ database
        return view('shop', compact('products')); // Gửi dữ liệu sang view shop.blade.php
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('shop.show', compact('product'));
    }

}

