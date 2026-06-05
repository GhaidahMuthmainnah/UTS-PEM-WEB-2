<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/categories');
});

Route::get('/products/trash', [ProductController::class, 'trash'])->name('products.trash');

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
