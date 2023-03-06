<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/',[HomeController::class, 'product'])->name('home.product');
Route::get('/product-detail/{id}',[HomeController::class, 'productDetail'])->name('home.product-detail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');


    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category/add', [CategoryController::class, 'create'])->name('category.add');
    Route::get('/category/manage',[CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');


    Route::get('/brand', [BrandController::class, 'index'])->name('brand');
    Route::post('/brand/add', [BrandController::class, 'create'])->name('brand.add');
    Route::get('/brand/manage', [BrandController::class, 'manage'])->name('brand.manage');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update{id}', [BrandController::class, 'update'])->name('brand.update');

    Route::get('/products', [ProductController::class, 'index'])->name('product');
    Route::get('/products/add', [ProductController::class, 'addproduct'])->name('product.add');
    Route::post('/products/add-product', [ProductController::class, 'create'])->name('product.create');
    Route::get('/products/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/products/update-product/{id}', [ProductController::class, 'update'])->name('product.update');

});
