<?php namespace Kaishiyoku\Menu;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Kaishiyoku\HtmlPurifier\HtmlPurifier;
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
     * Checks if the given route name is the current one.
     *
     * @param string $name
     * @return bool
     */
    public static function isCurrentRoute($name)
    {
        return Route::currentRouteName() == $name;
    }

    /**
     * Checks if given parameters and the current route's one are equal.
     *
     * @param $parameters
     * @return bool
     */
    public static function hasEqualParameters($parameters)
    {
        return count(array_diff($parameters, Route::current()->parameters())) == 0;
    }

    /**
     * Checks if the given route name and parameters are the current one.
     *
     * @param $name
     * @param $parameters
     * @return bool
     */
    public static function isCurrentRouteWithParameters($name, $parameters)
    {
        return self::isCurrentRoute($name) && self::hasEqualParameters($parameters);
    }

    /**
     * Purifies HTML to help preventing XSS.
     *
     * @param string $value
     * @return string
     */
    public static function purifyHtml($value)
    {
        $purifier = new HtmlPurifier();
        
        return $purifier->purify($value);
    }
}
