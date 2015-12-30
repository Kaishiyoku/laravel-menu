<?php namespace Kaishiyoku\Menu;

use Illuminate\Support\Collection;
use Kaishiyoku\Menu\Data\Dropdown;
use Kaishiyoku\Menu\Data\DropdownDivider;
use Kaishiyoku\Menu\Data\DropdownHeader;
use Kaishiyoku\Menu\Data\Link;
use Kaishiyoku\Menu\Data\MenuContainer;
use Kaishiyoku\Menu\Exceptions\MenuExistsException;
use Kaishiyoku\Menu\Exceptions\MenuNotFoundException;

class Menu
{
    const DEFAULT_MENU_NAME = 'DEFAULT';

    private $menus;

    public function __construct()
    {
        $this->menus = new Collection();
    }

    /**
     * @param null $name
     * @param null $entries
     * @param array $attributes
     * @throws MenuExistsException
     */
    public function add($name = null, $entries = null, $attributes = [])
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
     * @param null $entries
     * @param array $attributes
     * @throws MenuExistsException
     */
    public function addDefault($entries = null, $attributes = [])
    {
        $this->add(null, $entries, $attributes);
    }

    /**
     * @param $name
     * @param null $title
     * @param array $parameters
     * @param array $attributes
     * @return Link
     */
    public function link($name, $title = null, $parameters = [], $attributes = [])
    {
        return new Link($name, $title, $parameters, $attributes);
    }

    /**
     * @param $entries
     * @param $url
     * @param null $title
     * @param array $attributes
     * @param null $secure
     * @return Dropdown
     */
    public function dropdown($entries, $url, $title = null, $attributes = array(), $secure = null)
    {
        return new Dropdown($entries, $url, $title, $attributes, $secure);
    }

    /**
     * @return DropdownDivider
     */
    public function dropdownDivider()
    {
        return new DropdownDivider();
    }

    /**
     * @param $title
     * @return DropdownHeader
     */
    public function dropdownHeader($title)
    {
        return new DropdownHeader($title);
    }

    /**
     * Get the evaluated contents of the specified navbar.
     *
     * @param null $menuName
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
