<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\UserController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/category', [ApiController::class, 'category']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/home-banner', [ApiController::class, 'home_banner']);
    Route::get('/products-list/{id}', [ApiController::class, 'products_list']);
    Route::get('/products-detail/{id}', [ApiController::class, 'products_detail']);
    Route::post('/update-profile', [ApiController::class, 'update_profile']);
    Route::post('/custom-jewellery', [ApiController::class, 'custom_jewellery']);
});