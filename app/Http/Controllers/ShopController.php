<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // Lấy 20 sản phẩm mỗi trang
        $products = Product::paginate(12);
        // Trả về view 'shop' (shop.blade.php) và truyền biến $products
        return view('shop', compact('products'));
    }

    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('shop.show', compact('product'));
    }

}

