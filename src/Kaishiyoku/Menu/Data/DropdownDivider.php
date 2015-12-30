<?php namespace Kaishiyoku\Menu\Data;

use Illuminate\Contracts\Support\Renderable;

class DropdownDivider extends MenuEntry implements Renderable
{
    /**
     * Get the evaluated contents of the object.
     *
     * @return null
     */
    public function render()
    {
        return null;
    }
}
