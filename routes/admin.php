<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CmsController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/logout', [AdminAuthController::class, 'logout'])->middleware(['auth','admin'])->name('admin.logout');

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('product', ProductController::class);
    
    Route::post('/user/status-change', [UserController::class, 'changeStatus'])->name('user.status.change');
    Route::resource('user', UserController::class);

    Route::resource('banner', BannerController::class);
    Route::get('settings', [SettingController::class, 'updatesetting'])->name('updatesetting');
    Route::get('mobile-first-page', [SettingController::class, 'mobilefirstpage'])->name('mobilefirstpage');
    Route::post('mobile-update', [SettingController::class, 'mobileupdate'])->name('mobileupdate');
    Route::post('settings-update', [SettingController::class, 'settingsupdate'])->name('settingsupdate');

    Route::post('/cms/status-change', [CmsController::class, 'changeStatus'])->name('cms.status.change');
    Route::resource('cms', CmsController::class);
    
});