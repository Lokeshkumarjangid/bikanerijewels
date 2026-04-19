<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CustomizeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CmsController;


Route::get('/', [HomeController::class, 'index']);

/**************************Login and register page api *************************************/

Route::get('/loginoption',[LoginController::class,'loginoption'])->name('loginoption');

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/registerstore',[LoginController::class,'registerstore'])->name('registerstore');

Route::get('/continuewithmobile',[LoginController::class,'continuewithmobile'])->name('continuewithmobile');
Route::post('/loginwithmobile',[LoginController::class,'loginwithmobile'])->name('loginwithmobile');

Route::get('/continuewithemail',[LoginController::class,'continuewithemail'])->name('continuewithemail');
Route::post('/loginwithemail',[LoginController::class,'loginwithemail'])->name('loginwithemail');
Route::get('/loginwithpassword',[LoginController::class,'loginwithpassword'])->name('loginwithpassword');
Route::post('/loginemail',[LoginController::class,'loginemail'])->name('loginemail');

Route::get('/otp',[LoginController::class,'otp'])->name('otp');

/**************************Login and register page api end *************************************/

/**************************Product list and Product detatils page api*************************************/

Route::get('/product-details/{id}',[ProductController::class,'product_details'])->name('productdetails');

/**************************Product list and Product detatils page api end *************************************/

Route::get('/customize', [CustomizeController::class, 'index'])->name('customize.index');
Route::get('/cms/{slug}', [CmsController::class, 'index'])->name('cms.index');


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
