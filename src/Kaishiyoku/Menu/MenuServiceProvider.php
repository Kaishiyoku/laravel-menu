<?php

namespace Kaishiyoku\Menu;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $dispatcher
     * @return void
     */
    public function boot(Dispatcher $dispatcher)
    {
        $this->registerMenus();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('menu', function () {
            return new Menu();
        });
    }

    // This method can be overridden in a child class
    public function registerMenus()
    {
        // Load the app menus if they're in app/Http/menus.php
        if (file_exists($file = $this->app['path'].'/Http/menus.php'))
        {
            require $file;
        }
    }
}