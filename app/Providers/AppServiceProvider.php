<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


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
        Blade::directive('svg', function ($expression) {
            $path = resource_path("svg/{$expression}.svg");
            if (file_exists($path)) {
                return file_get_contents($path);
            }
            return "<!-- SVG file not found: {$expression}.svg -->";
        });
    }
}
