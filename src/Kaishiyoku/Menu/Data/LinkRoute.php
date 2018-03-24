<?php

namespace Kaishiyoku\Menu\Data;

use Collective\Html\HtmlFacade as Html;
use Illuminate\Contracts\Support\Renderable;
use Kaishiyoku\Menu\MenuHelper;

class LinkRoute extends MenuEntry implements Renderable
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
     * @var bool
     */
    private $isVisible;

    /**
     * @param string $name
     * @param string|null $title
     * @param array $parameters
     * @param array $attributes
     * @param array $additionalRouteNames
     * @param bool $isVisible
     */
    public function __construct($name, $title = null, $parameters = [], $attributes = [], $additionalRouteNames = [], $isVisible = true)
    {
        $this->name = $name;
        $this->title = $title;
        $this->parameters = $parameters;
        $this->attributes = $attributes;
        $this->additionalRouteNames = $additionalRouteNames;
        $this->isVisible = $isVisible;
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @param null|array $customAttributes
     * @return string
     */
    public function render($customAttributes = null)
    {
        if ($customAttributes != null && count($customAttributes) > 0) {
            $attributes = array_merge($this->attributes, $customAttributes);
        } else {
            $attributes = $this->attributes;

            if (count(MenuHelper::getConfig()->getAnchorElementClasses()) > 0) {
                if (!array_key_exists('class', $attributes)) {
                    $attributes['class'] = '';
                }

                foreach (MenuHelper::getConfig()->getAnchorElementClasses() as $listElementClass) {
                    $attributes['class'] .= ' ' . $listElementClass;
                }
            }
        }

        if (empty($this->name)) {
            $content = Html::link('#', $this->title, $attributes);
        } else {
            $content = Html::linkRoute($this->name, $this->title, $this->parameters, $attributes);
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
     * Get the link's parameters.
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
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

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->isVisible;
    }
}
