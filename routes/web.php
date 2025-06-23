<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect('/login');
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.page')->middleware('auth');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
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

Route::prefix('admin')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});


Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/product/{id}', [ShopController::class, 'show'])->name('product.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
