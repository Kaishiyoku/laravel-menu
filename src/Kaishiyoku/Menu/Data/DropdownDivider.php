<?php namespace Kaishiyoku\Menu\Data;

use Illuminate\Contracts\Support\Renderable;

class DropdownDivider extends MenuEntry implements Renderable
{
    /**
     * @var bool
     */
    private $isVisible;

    /**
     * @param bool $isVisible
     */
    public function __construct($isVisible = true)
    {
        $this->isVisible = $isVisible;
    }


    /**
     * Get the evaluated contents of the object.
     *
     * @return null
     */
    public function render()
    {
        return null;
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->isVisible;
    }
}
