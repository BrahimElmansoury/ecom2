<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\client\ShopCartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StoreController::class,'index'])->name('homepage');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['admin'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin_dashboard');
});

Route::middleware(['editor'])->group(function () {
    Route::get('/editor/dashboard', function () {
        return 'Hi Editor';
    })->name('editor_dashboard');
});

// addTocart
Route::get('/shop/add-to-cart/{product}', [ShopCartController::class, 'index'])->name('shop.addTocart');

//checkout
Route::get('/checkout/{id}', [ShopCartController::class, 'checkout'])->name('products.checkout');

//stock info de client
Route::post('/checkout/store', [ShopCartController::class, 'store'])->name('checkout.store');

//remove product from panier
Route::delete('/remove-product/{id}', [ProductController::class, 'removeProduct'])->name('remove-product');

require __DIR__.'/auth.php';

//  admin ---

Route::get('/order', [AdminController::class, 'order'])->name('admin.order');
Route::get('/admin', [AdminController::class, 'indexAdmin'])->name('admin.indexAdmin');
Route::get('/product', [AdminController::class, 'product'])->name('admin.product');
Route::get('/category', [AdminController::class, 'category'])->name('admin.category');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'storeProduct'])->name('product.store');
Route::post('/category', [AdminController::class, 'storeCategory'])->name('category.store');
Route::get('/admin/product/{product}/edit', [AdminController::class, 'edite'])->name('admin.product.edite');
Route::delete('/admin/product/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::get('/admin/category/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('/admin/category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::delete('/admin/category/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
Route::get('/admin/stock', [AdminController::class, 'showStockForm'])->name('admin.stock');
Route::post('/admin/stock', [AdminController::class, 'addStock'])->name('admin.addStock');
