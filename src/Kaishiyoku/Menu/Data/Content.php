<?php

namespace Kaishiyoku\Menu\Data;

use Illuminate\Contracts\Support\Renderable;

class Content extends MenuEntry implements Renderable
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var bool
     */
    private $isVisible;

    /**
     * @param string $content
     * @param bool $isVisible
     */
    public function __construct($content, $isVisible = true)
    {
        $this->content = $content;
        $this->isVisible = $isVisible;
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        return $this->content;
    }
    
    public function isVisible()
    {
        return $this->isVisible;
    }
}
