<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/about', 'about')->name('about');

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
