<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'product_name'     => $product->product_name,
                'image'            => $product->image,
                'selling_price'    => $product->selling_price,
                'actual_price'     => $product->actual_price,
                'average_rating'   => $product->average_rating,
                'rating_and_review'=> $product->rating_and_review,
                'ram'              => $product->ram,
                'ssd'              => $product->ssd,
                'processor'        => $product->processor,
                'operating_system' => $product->operating_system,
                'exchange_offer'   => $product->exchange_offer,
                'display_size'     => $product->display_size,
                'quantity'         => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Cập nhật giỏ hàng thành công!');
        }

        return redirect()->route('cart.index')->with('error', 'Sản phẩm không tồn tại trong giỏ!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ!');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Đã xóa toàn bộ giỏ hàng!');
    }
}
