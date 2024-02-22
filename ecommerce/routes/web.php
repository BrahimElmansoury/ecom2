<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/',[StoreController::class,'index']);
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);


//Route::get('/products',[ProductController::class,'index'])->name('products.index');

//create a new product
/*
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');

Route::delete('products/{product}',[ProductController::class,'destroy'] )->name('products.destroy');

*/
//modification
/*
Route::get('/products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::put('/products/{products}',[ProductController::class,'update'])->name('products.update');
*/



