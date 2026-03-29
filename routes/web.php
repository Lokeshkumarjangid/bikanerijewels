<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CustomizeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\LoginController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/loginoption',[LoginController::class,'loginoption'])->name('loginoption');

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/registerstore',[LoginController::class,'registerstore'])->name('registerstore');

Route::get('/continuewithmobile',[LoginController::class,'continuewithmobile'])->name('continuewithmobile');
Route::post('/loginwithmobile',[LoginController::class,'loginwithmobile'])->name('loginwithmobile');

Route::get('/continuewithemail',[LoginController::class,'continuewithemail'])->name('continuewithemail');
Route::post('/loginwithemail',[LoginController::class,'loginwithemail'])->name('loginwithemail');

Route::get('/otp',[LoginController::class,'otp'])->name('otp');

// Route::get('/product', [ProductController::class, 'index'])->name('product.index');
// Route::get('/product-detail', [ProductController::class, 'product_details'])->name('product.product_details');

Route::get('/customize', [CustomizeController::class, 'index'])->name('customize.index');
