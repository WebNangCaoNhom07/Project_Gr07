<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
Route::get('/', function () {
    return view('welcome');
});
Route::view('/about', 'about')->name('about');

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');

//single product route
Route::get('/product/{id}', [ShopController::class, 'show'])->name('product.show');

//cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

