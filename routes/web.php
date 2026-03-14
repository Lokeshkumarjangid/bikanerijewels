<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ProductController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product-detail', [ProductController::class, 'product_details'])->name('product.product_details');