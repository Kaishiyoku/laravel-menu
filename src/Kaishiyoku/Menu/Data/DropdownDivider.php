<?php namespace Kaishiyoku\Menu\Data;

use Illuminate\Contracts\Support\Renderable;

class DropdownDivider extends MenuEntry implements Renderable
{
    public function __construct()
    {

    }

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        return null;
    }
}
