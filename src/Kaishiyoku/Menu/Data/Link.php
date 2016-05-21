<?php namespace Kaishiyoku\Menu\Data;

use Collective\Html\HtmlFacade as Html;
use Illuminate\Contracts\Support\Renderable;
use Kaishiyoku\Menu\MenuHelper;

class Link extends MenuEntry implements Renderable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $title;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @var array
     */
    private $additionalRouteNames;

    /**
     * @param string $name
     * @param string|null $title
     * @param array $parameters
     * @param array $attributes
     * @param array $additionalRouteNames
     */
    public function __construct($name, $title = null, $parameters = [], $attributes = [], $additionalRouteNames = [])
    {
        $this->name = $name;
        $this->title = $title;
        $this->parameters = $parameters;
        $this->attributes = $attributes;
        $this->additionalRouteNames = $additionalRouteNames;
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        if (empty($this->name)) {
            $content = Html::link('#', $this->title, $this->attributes);
        } else {
            $content = Html::linkRoute($this->name, $this->title, $this->parameters, $this->attributes);
        }

        return $content;
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

    /**
     * Get additional route names.
     *
     * @return array
     */
    public function getAdditionalRouteNames()
    {
        return $this->additionalRouteNames;
    }
}
