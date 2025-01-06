<?php

namespace App\Providers;

use App\Http\Controllers\ecommerce\CartController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ecommerce\WishlistController;
use Illuminate\Support\Facades\Schema;
use App\View\Components\AdminAppLayout;
use App\View\Components\EcommerceAppLayout; 
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
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
        Schema::defaultStringLength(191);
        Blade::component('admin-app-layout', AdminAppLayout::class);
        Blade::component('ecommerce-app-layout', EcommerceAppLayout::class);
        // Share the wishlist count with all views
        View::composer('*', function ($view) {
            $wishlistCount = WishlistController::getWishlistCount();
            $view->with('wishlistCount', $wishlistCount);
        });

        View::composer('*', function ($view) {
            $cartCount = CartController::getCartCount();
            $view->with('cartCount', $cartCount);
        });
    }
}
