<?php namespace Kaishiyoku\Menu\Data;

use Illuminate\Contracts\Support\Renderable;

abstract class MenuEntry implements Renderable
{
    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    abstract public function render();
}
