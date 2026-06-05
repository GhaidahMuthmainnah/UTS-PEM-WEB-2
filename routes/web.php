<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/categories');
});

Route::get('/products/trash', [ProductController::class, 'trash'])->name('products.trash');
Route::put('/products/{product}/restore', [ProductController::class, 'restore'])->withTrashed()->name('products.restore');
Route::delete('/products/{product}/force-delete', [ProductController::class, 'forceDelete'])->withTrashed()->name('products.force-delete');

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
