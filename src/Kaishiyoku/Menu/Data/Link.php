<?php

namespace Kaishiyoku\Menu\Data;

use Collective\Html\HtmlFacade as Html;
use Illuminate\Contracts\Support\Renderable;
use Kaishiyoku\Menu\MenuHelper;

class Link extends MenuEntry implements Renderable
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $title;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @var bool
     */
    private $isVisible;

    /**
     * @param string $url
     * @param string|null $title
     * @param array $attributes
     * @param bool $isVisible
     */
    public function __construct($url, $title = null, $attributes = [], $isVisible = true)
    {
        $this->url = $url;
        $this->title = $title;
        $this->attributes = $attributes;
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

        return Html::link($this->url, $this->title, $attributes);
    }

    /**
     * Get the link's route name.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->isVisible;
    }
}
