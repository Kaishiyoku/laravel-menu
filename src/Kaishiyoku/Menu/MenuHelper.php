<?php

namespace Kaishiyoku\Menu;

use Illuminate\Support\Facades\Route;
use Kaishiyoku\HtmlPurifier\HtmlPurifier;
use Kaishiyoku\Menu\Config\Config;

class MenuHelper
{
    /**
     * @var Config
     */
    private static $config;

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

    public static function storeConfig(Config $config)
    {
        self::$config = $config;
    }

    public static function getConfig()
    {
        return self::$config;
    }
}
