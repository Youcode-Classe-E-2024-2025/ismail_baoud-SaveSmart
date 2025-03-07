<?php

namespace App\Providers;

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
    public function boot()
    {
        if (app()->runningInConsole()) {
            // Disable terminal interaction or set alternative process handling
            putenv('NO_INTERACTION=1');
        }
    }

}
