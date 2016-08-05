<?php namespace Kaishiyoku\Menu\Data;

use Collective\Html\HtmlFacade as Html;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Kaishiyoku\Menu\MenuHelper;

class MenuContainer implements Renderable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Collection
     */
    private $entries;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @var bool
     */
    private $isVisible;

    /**
     * @param string|null $name
     * @param array $entries
     * @param array $attributes
     * @param bool $isVisible
     */
    public function __construct($name = null, $entries, $attributes = [], $isVisible = true)
    {
        $this->name = $name;
        $this->entries = new Collection($entries);
        $this->attributes = $attributes;
        $this->isVisible = $isVisible;
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        $output = '';

        foreach ($this->entries as $entry) {
            $entryAttributes = [];

            if ($entry instanceof Dropdown) {
                $entryAttributes['class'] = 'dropdown';

                foreach ($entry->getEntries() as $dropdownEntry) {
                    if ($dropdownEntry instanceof Link) {
                        foreach ($dropdownEntry->getAdditionalRouteNames() as $additionalRouteName) {
                            if (MenuHelper::isCurrentRoute($additionalRouteName)) {
                                $entryAttributes['class'] .= ' active';
                            }
                        }

                        if (MenuHelper::isCurrentRoute($dropdownEntry->getName())) {
                            $entryAttributes['class'] .= ' active';
                        }
                    }
                }
            } elseif ($entry instanceof Content) {
                $entryAttributes['class'] = 'navbar-text';
            } else {
                foreach ($entry->getAdditionalRouteNames() as $additionalRouteName) {
                    if (MenuHelper::isCurrentRoute($additionalRouteName)) {
                        $entryAttributes['class'] = ' active';
                    }
                }

                if (MenuHelper::isCurrentRoute($entry->getName())) {
                    $entryAttributes['class'] = 'active';
                }
            }

            if ($entry->isVisible()) {
                $output .= '<li ' . Html::attributes($entryAttributes) . '>' . $entry->render() . '</li>';
            }
        }

        return '<ul ' . Html::attributes($this->attributes) . '>' . $output . '</ul>';
    }

    /**
     * Get the name of the menu container.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->isVisible;
    }
}