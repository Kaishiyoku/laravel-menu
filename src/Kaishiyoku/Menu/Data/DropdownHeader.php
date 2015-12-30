<?php namespace Kaishiyoku\Menu\Data;

use Illuminate\Contracts\Support\Renderable;

class DropdownHeader extends MenuEntry implements Renderable
{
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        return $this->title;
    }
}
