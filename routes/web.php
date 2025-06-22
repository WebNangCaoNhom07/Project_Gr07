<?php
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ReportController;

Route::get('/', function () {
    return redirect('/login');
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('orders', OrderController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // resources/views/dashboard.blade.php
    })->name('dashboard');
});
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
});

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // resources/views/admin/dashboard.blade.php
    })->name('admin.dashboard');
});
Route::middleware('auth')->get('/admin', function () {
    return view('giaodienadmin');
})->name('admin.page');


Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
