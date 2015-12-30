<?php namespace Kaishiyoku\Menu\Data;

use Collective\Html\HtmlFacade as Html;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Kaishiyoku\Menu\MenuHelper;

class Dropdown extends MenuEntry implements Renderable
{
    private $entries;
    private $title;
    private $name;
    private $parameters;
    private $attributes;

    /**
     * @param $entries
     * @param $title
     * @param null $name
     * @param array $parameters
     * @param array $attributes
     */
    public function __construct($entries, $title, $name = null, $parameters = [], $attributes = [])
    {
        $this->entries = new Collection($entries);
        $this->title = $title;
        $this->name = $name;
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
        $output = '';

        foreach ($this->entries as $entry) {
            $entryAttributes = [];

            if ($entry instanceof DropdownDivider) {
                $entryAttributes['role'] = 'seperator';
                $entryAttributes['class'] = 'divider';
            } else {
                if ($entry instanceof DropdownHeader) {
                    $entryAttributes['class'] = 'dropdown-header';
                } else {
                    if (MenuHelper::isCurrentRoute($entry->getName())) {
                        $entryAttributes['class'] = 'active';
                    }
                }
            }

            $output .= '<li ' . Html::attributes($entryAttributes) . '>' . $entry->render() . '</li>';
        }

        $link = '';

        if (empty($this->name)) {
            $link = Html::link('#', $this->title . '<span class="caret"></span>',
                ['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown']);
        } else {
            $link = Html::linkRoute($this->name, $this->title . '<span class="caret"></span>', $this->parameters,
                ['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown']);
        }

        return
            Html::decode($link) . '<ul class="dropdown-menu">' . $output . '</ul>';
    }

    /**
     * @return Collection
     */
    public function getEntries()
    {
        return $this->entries;
    }
}
