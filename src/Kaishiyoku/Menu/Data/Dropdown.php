<?php

namespace Kaishiyoku\Menu\Data;

use Collective\Html\HtmlFacade as Html;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Kaishiyoku\Menu\MenuHelper;

class Dropdown extends MenuEntry implements Renderable
{
    /**
     * @var Collection
     */
    private $entries;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @var bool
     */
    private $isVisible;

    /**
     * @param array $entries
     * @param string $title
     * @param string|null $name
     * @param array $parameters
     * @param array $attributes
     * @param bool $isVisible
     */
    public function __construct($entries, $title, $name = null, $parameters = [], $attributes = [], $isVisible = true)
    {
        $this->entries = new Collection($entries);
        $this->title = $title;
        $this->name = $name;
        $this->parameters = $parameters;
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
        $output = '';

        foreach ($this->entries as $entry) {
            $isActive = false;
            $entryAttributes = [];

            if ($entry instanceof DropdownDivider) {
                $entryAttributes['role'] = 'seperator';
                $entryAttributes['class'] = 'divider';
            } else {
                if ($entry instanceof DropdownHeader) {
                    $entryAttributes['class'] = 'dropdown-header';
                } else if ($entry instanceof Content) {
                    $entryAttributes['class'] = 'content';
                } else if ($entry instanceof Link) {

                } else {
                    if (MenuHelper::isCurrentRouteWithParameters($entry->getName(), $entry->getParameters())) {
                        $entryAttributes['class'] = 'active';
                        $isActive = true;
                    } else {
                        foreach ($entry->getAdditionalRouteNames() as $additionalRouteName) {
                            if (MenuHelper::isCurrentRoute($additionalRouteName)) {
                                $entryAttributes['class'] = ' active';
                                $isActive = true;
                            }
                        }
                    }
                }
            }

            if (MenuHelper::getConfig()->getCustomDropdownItemRenderFunction() != null) {
                $output .= MenuHelper::getConfig()->getCustomDropdownItemRenderFunction()($entry, $isActive);
            } else {
                $output .= '<li ' . Html::attributes($entryAttributes) . '>' . $entry->render() . '</li>';
            }
        }

        $classes = 'dropdown-toggle';

        if (count(MenuHelper::getConfig()->getAnchorElementClasses()) > 0) {
            foreach (MenuHelper::getConfig()->getAnchorElementClasses() as $anchorElementClass) {
                $classes .= ' ' . $anchorElementClass;
            }
        }

        if (empty($this->name)) {
            $link = Html::link('#', $this->title . '<span class="caret"></span>',
                ['class' => $classes, 'data-toggle' => 'dropdown']);
        } else {
            $link = Html::linkRoute($this->name, $this->title . '<span class="caret"></span>', $this->parameters,
                ['class' => $classes, 'data-toggle' => 'dropdown']);
        }

        if (MenuHelper::getConfig()->getCustomDropdownContainerRenderFunction() != null) {
            $additionalClasses = array_key_exists('class', $this->attributes) ? $this->attributes['class'] : null;

            return MenuHelper::getConfig()->getCustomDropdownContainerRenderFunction()($link, $output, $additionalClasses);
        }

        $dropdownClasses = 'dropdown-menu';

        if (array_key_exists('class', $this->attributes)) {
            $dropdownClasses = $this->attributes['class'];
        }

        return $link . '<ul class="' . $dropdownClasses . '">' . $output . '</ul>';
    }

    /**
     * Get all items of the dropdown.
     *
     * @return Collection
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->isVisible;
    }
    
    
}
