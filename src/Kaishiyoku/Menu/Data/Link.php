<?php namespace Kaishiyoku\Menu\Data;

use Collective\Html\HtmlFacade as Html;
use Illuminate\Contracts\Support\Renderable;

class Link extends MenuEntry implements Renderable
{
    private $name;
    private $title;
    private $parameters;
    private $attributes;

    /**
     * @param string$name
     * @param string|null $title
     * @param array $parameters
     * @param array $attributes
     */
    public function __construct($name, $title = null, $parameters = [], $attributes = [])
    {
        $this->name = $name;
        $this->title = $title;
        $this->parameters = $parameters;
        $this->attributes = $attributes;
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        if (empty($this->name)) {
            return Html::link('#', $this->title, $this->attributes);
        } else {
            return Html::linkRoute($this->name, $this->title, $this->parameters, $this->attributes);
        }
    }

    /**
     * Get the link's route name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
