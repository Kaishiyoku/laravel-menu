<?php

namespace Kaishiyoku\Menu\Facades;

use Illuminate\Support\Facades\Facade;

class Menu extends Facade
{
    /**
     * Get the registered component.
     *
     * @return object
     */
    protected static function getFacadeAccessor()
    {
        return 'menu';
    }
}
