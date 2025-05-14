<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
    use \Mcamara\LaravelLocalization\Traits\LoadsTranslatedCachedRoutes;
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RouteServiceProvider::loadCachedRoutesUsing(fn() => $this->loadCachedRoutes());
        Paginator::useBootstrapFive();
    }
}
