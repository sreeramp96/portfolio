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
    public function boot(): void
    {
        foreach (glob(config_path('portfolio/*.php')) as $file) {
            $key = 'portfolio.' . basename($file, '.php');
            config([$key => require $file]);
        }
    }
}
