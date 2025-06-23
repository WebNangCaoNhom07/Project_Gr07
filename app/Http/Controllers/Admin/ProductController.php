<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'     => 'required|string|max:255',
            'selling_price'    => 'required|numeric',
            'actual_price'     => 'nullable|numeric',
            'average_rating'   => 'nullable|numeric',
            'rating_and_review'=> 'nullable|string',
            'ram'              => 'nullable|string',
            'ssd'              => 'nullable|string',
            'processor'        => 'nullable|string',
            'operating_system' => 'nullable|string',
            'exchange_offer'   => 'nullable|string',
            'display_size'     => 'nullable|string',
            'image'            => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'product_name', 'selling_price', 'actual_price', 'average_rating',
            'rating_and_review', 'ram', 'ssd', 'processor',
            'operating_system', 'exchange_offer', 'display_size'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'product_name'     => 'required|string|max:255',
            'selling_price'    => 'required|numeric',
            'actual_price'     => 'nullable|numeric',
            'average_rating'   => 'nullable|numeric',
            'rating_and_review'=> 'nullable|string',
            'ram'              => 'nullable|string',
            'ssd'              => 'nullable|string',
            'processor'        => 'nullable|string',
            'operating_system' => 'nullable|string',
            'exchange_offer'   => 'nullable|string',
            'display_size'     => 'nullable|string',
        ]);

        $data = $request->only([
            'product_name', 'selling_price', 'actual_price', 'average_rating',
            'rating_and_review', 'ram', 'ssd', 'processor',
            'operating_system', 'exchange_offer', 'display_size'
        ]);

        

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Xoá sản phẩm thành công!');
    }
}
