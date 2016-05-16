<?php namespace Kaishiyoku\Menu\Data;

use Collective\Html\HtmlFacade as Html;
use Illuminate\Contracts\Support\Renderable;

class Content extends MenuEntry implements Renderable
{
    /**
     * @var string
     */
    private $content;

    /**
     * @param string $content
     */
    public function __construct($content)
    {
        $this->content = $content;
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
}
