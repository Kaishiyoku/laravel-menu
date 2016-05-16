<?php namespace Kaishiyoku\Menu;

use Illuminate\Support\Collection;
use Kaishiyoku\Menu\Data\Content;
use Kaishiyoku\Menu\Data\Dropdown;
use Kaishiyoku\Menu\Data\DropdownDivider;
use Kaishiyoku\Menu\Data\DropdownHeader;
use Kaishiyoku\Menu\Data\Link;
use Kaishiyoku\Menu\Data\MenuContainer;
use Kaishiyoku\Menu\Exceptions\MenuExistsException;
use Kaishiyoku\Menu\Exceptions\MenuNotFoundException;

class Menu
{
    /**
     * @var string
     */
    const DEFAULT_MENU_NAME = 'DEFAULT';

    /**+
     * @var Collection
     */
    private $menus;

    public function __construct()
    {
        $this->menus = new Collection();
    }

    /**
     * Adds a new menu container.
     *
     * @param string|null $name
     * @param array $entries
     * @param array $attributes
     * @throws MenuExistsException
     */
    public function add($name = null, $entries = [], $attributes = [])
    {
        if (empty($name)) {
            $name = self::DEFAULT_MENU_NAME;
        }

        // check if menu's name does not exist
        $exists = false;

        foreach ($this->menus as $menu) {
            if ($menu->getName() == $name) {
                $exists = true;
            }
        }

        if (!$exists) {
            $this->menus->push(new MenuContainer($name, $entries, $attributes));
        } else {
            throw new MenuExistsException($name);
        }
    }

    /**
     * Adds a new menu container under the default name.
     *
     * @param array $entries
     * @param array $attributes
     * @throws MenuExistsException
     */
    public function addDefault($entries = [], $attributes = [])
    {
        $this->add(null, $entries, $attributes);
    }

    /**
     * Returns a new html anchor.
     *
     * @param string, $routeName
     * @param string|null $title
     * @param array $parameters
     * @param array $attributes
     * @param array $additionalRouteNames
     * @param bool $unescape
     * @return Link
     */
    public function link($routeName, $title = null, $parameters = [], $attributes = [], $additionalRouteNames = [], $unescape = false)
    {
        return new Link($routeName, $title, $parameters, $attributes, $additionalRouteNames, $unescape);
    }

    /**
     * Returns a new html ul-like dropdown menu with sub-elements.
     *
     * @param array $entries
     * @param string $title
     * @param string|null $name
     * @param array $parameters
     * @param array $attributes
     * @return Dropdown
     */
    public function dropdown($entries, $title, $name = null, $parameters = [], $attributes = [])
    {
        return new Dropdown($entries, $title, $name, $parameters, $attributes);
    }

    /**
     * @return DropdownDivider
     */
    public function dropdownDivider()
    {
        return new DropdownDivider();
    }

    /**
     * @param string $title
     * @return DropdownHeader
     */
    public function dropdownHeader($title)
    {
        return new DropdownHeader($title);
    }

    /**
     * @param string $content
     * @return Content
     */
    public function content($content)
    {
        return new Content($content);
    }

    /**
     * Get the evaluated contents of the specified menu container.
     *
     * @param string|null $menuName
     * @return string
     * @throws MenuNotFoundException
     */
    public function render($menuName = null)
    {
        if (empty($menuName)) {
            $menuName = self::DEFAULT_MENU_NAME;
        }

        $menu = $this->menus->filter(function (MenuContainer $menu) use ($menuName) {
            return $menu->getName() == $menuName;
        })->first();

        if ($menu instanceof MenuContainer) {
            return $menu->render();
        } else {
            throw new MenuNotFoundException($menuName);
        }
    }
}
