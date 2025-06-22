<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'selling_price' => 'required|numeric',
            'actual_price' => 'nullable|numeric',
            'ram' => 'nullable',
            'ssd' => 'nullable',
            'processor' => 'nullable',
            'operating_system' => 'nullable',
            'display_size' => 'nullable',
            'exchange_offer' => 'nullable',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'selling_price' => 'required|numeric',
            'actual_price' => 'nullable|numeric',
            'ram' => 'nullable',
            'ssd' => 'nullable',
            'processor' => 'nullable',
            'operating_system' => 'nullable',
            'display_size' => 'nullable',
            'exchange_offer' => 'nullable',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Đã xóa sản phẩm.');
    }
}
