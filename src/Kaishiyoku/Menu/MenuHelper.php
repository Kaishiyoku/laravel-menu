<?php namespace Kaishiyoku\Menu;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Kaishiyoku\Menu\Data\Dropdown;
use Kaishiyoku\Menu\Data\Link;
use Kaishiyoku\Menu\Data\MenuContainer;
use Kaishiyoku\Menu\Exceptions\MenuExistsException;
use Kaishiyoku\Menu\Exceptions\MenuNotFoundException;

class MenuHelper
{
    private function __construct()
    {

    }

    /**
     * @param $name
     * @return bool
     */
    public static function isCurrentRoute($name)
    {
        return Route::currentRouteName() == $name;
    }
}
