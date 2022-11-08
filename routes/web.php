<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*------------------------------------------------------------------------------------
| Homepage  Routes
------------------------------------------------------------------------------------*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/about', 'about')->name('home.about');
    Route::get('/contact', 'contact')->name('home.contact');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'index')->name('product.index');
    Route::get('/product{id}', 'show')->name('product.show');
    Route::get('/prodcut/search', 'search')->name('product.search');
});

/*------------------------------------------------------------------------------------
| Cart Routes
------------------------------------------------------------------------------------*/
Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::post('/cart/add/{id}', 'add')->name('cart.add');
    Route::get('/cart/delete', 'delete')->name('cart.delete');
    Route::get('/cart/error', 'purchase')->name('cart.error');
});

/*------------------------------------------------------------------------------------
| User middleware Route
------------------------------------------------------------------------------------*/

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', [CartController::class, 'purchase'])->name('cart.purchase');
    Route::get('/myaccount/myAccount', [MyAccountController::class, 'orders'])->name('myaccount.myAccount');
});

/*------------------------------------------------------------------------------------
| Admin middleware routes
------------------------------------------------------------------------------------*/

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin.home.index');
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/add', [AdminHomeController::class, 'addProduct'])->name('admin.products.add');
    Route::post('/admin/products/store', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::delete('/admin/products/{id}/delete', [AdminProductController::class, 'delete'])->name('admin.products.delete');
    Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}/update', [AdminProductController::class, 'update'])->name('admin.products.update');
});

Auth::routes();
