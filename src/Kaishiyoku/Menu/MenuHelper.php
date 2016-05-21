<?php namespace Kaishiyoku\Menu;

use HTMLPurifier;
use HTMLPurifier_Config;
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
     * Purifies HTML to help preventing XSS.
     *
     * @param string $value
     * @return string
     */
    public static function purifyHtml($value)
    {
        $htmlPurifierConfig = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($htmlPurifierConfig);

        return $purifier->purify($value);
    }
}
