<?php

namespace Kaishiyoku\LaravelMenu;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/Views', 'laravel-menu');

        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/laravel-menu'),
        ], 'views');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LaravelMenu::class, function ($app) {
            return new LaravelMenu();
        });
    }
}
