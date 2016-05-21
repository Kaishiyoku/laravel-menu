<?php namespace Kaishiyoku\Menu\Data;

use Illuminate\Contracts\Support\Renderable;

class DropdownHeader extends MenuEntry implements Renderable
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var bool
     */
    private $isVisible;

    /**
     * @param string $title
     * @param bool $isVisible
     */
    public function __construct($title, $isVisible = true)
    {
        $this->title = $title;
        $this->isVisible = $isVisible;
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

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->isVisible;
    }
}
