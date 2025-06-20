<?php

use App\Http\Controllers\LaptopController;
use App\Http\Controllers\ShowLaptopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/about', 'about')->name('about');

// Route::controller(LaptopController :: class)->group(function(){
//     Route::get('/laptop','index');
//     Route::get('/My-laptop','myLaptop');
// // });
Route::get('/laptop/invokable', LaptopController::class);
Route::get('/laptop', [LaptopController::class,'index']); 

// routes/web.php
Route::get('/dashboard', [DashboardController::class, 'index']);
