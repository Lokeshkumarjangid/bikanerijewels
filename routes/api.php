<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\UserController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/forgot-password', [UserController::class, 'forgot_password']);
Route::post('/otp-verify', [UserController::class, 'otp_verify']);
Route::post('/password-change', [UserController::class, 'password_change']);

Route::get('/category', [ApiController::class, 'category']);
Route::post('/product-search', [ApiController::class, 'product_search']);

//cms   
Route::get('/cms', [ApiController::class, 'get_cms']);

//Mobile first page
Route::get('/mobile-first-page', [ApiController::class, 'mobile_first_page']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/home-banner', [ApiController::class, 'home_banner']);
    Route::get('/products-list/{id}', [ApiController::class, 'products_list']);
    Route::get('/products-detail/{id}', [ApiController::class, 'products_detail']);
    Route::post('/update-profile', [ApiController::class, 'update_profile']);
    Route::post('/custom-jewellery', [ApiController::class, 'custom_jewellery']);
    Route::post('/products-list', [ApiController::class, 'products_list_all']);
    
    // Wishlist Routes
    Route::post('/wishlist-add-update', [ApiController::class, 'add_to_wishlist']);
    Route::post('/wishlist-remove', [ApiController::class, 'remove_from_wishlist']);
    Route::get('/wishlist-list', [ApiController::class, 'get_wishlist']);

    //rating and review
    Route::post('/submit-review', [ApiController::class, 'submit_review']);
    Route::get('/get-review/{product_id}', [ApiController::class, 'get_review']);

    //Order
    Route::get('/order-create/{id}', [ApiController::class, 'create_order']);
    Route::post('/get-orders', [ApiController::class, 'get_orders']);
    Route::get('/order-details/{id}', [ApiController::class, 'get_order_details']);
    
    //Address
    Route::post('/add-address', [ApiController::class, 'add_address']);
    Route::get('/get-address', [ApiController::class, 'get_address']);
    Route::post('/update-address/{id}', [ApiController::class, 'update_address']);
    Route::delete('/delete-address/{id}', [ApiController::class, 'delete_address']);

});