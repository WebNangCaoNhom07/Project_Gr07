<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/about', 'about')->name('about');

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
