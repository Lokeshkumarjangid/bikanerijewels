<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\NavigationService;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.partials.header', function ($view) {
            $menu = app(NavigationService::class)->getMenuWithCategories();
            $view->with('menuItems', $menu);
        });
    }
}
