<?php

namespace App\Providers;

use Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer(['layouts.app', 'products.show'], function ($view) {
            $view->with([
                'cartCount' => Cart::getTotalQuantity(), 
                'cartTotal' => Cart::getTotal(),
            ]);
        });
    }
}
