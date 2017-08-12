<?php namespace Kaishiyoku\Menu\Data;

use Illuminate\Contracts\Support\Renderable;
use Kaishiyoku\Menu\Config\Config;

abstract class MenuEntry implements Renderable
{
    /**
     * Get the evaluated contents of the object.
     *
     * @param null|array $customAttributes
     * @return string
     */
    abstract public function render($customAttributes = null);

    /**
     * @return bool
     */
    abstract public function isVisible();
}
