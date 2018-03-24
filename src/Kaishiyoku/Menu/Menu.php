<?php

namespace Kaishiyoku\Menu;

use Collective\Html\HtmlFacade as Html;
use Illuminate\Support\Collection;
use Kaishiyoku\Menu\Config\Config;
use Kaishiyoku\Menu\Data\Content;
use Kaishiyoku\Menu\Data\Dropdown;
use Kaishiyoku\Menu\Data\DropdownDivider;
use Kaishiyoku\Menu\Data\DropdownHeader;
use Kaishiyoku\Menu\Data\Link;
use Kaishiyoku\Menu\Data\LinkRoute;
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
        MenuHelper::storeConfig(new Config());
        $this->menus = new Collection();
    }

    public function setConfig(Config $config)
    {
        MenuHelper::storeConfig($config);
    }

    /**
     * Registers a new menu container.
     *
     * @param string|null $name
     * @param array $entries
     * @param array $attributes
     * @throws MenuExistsException
     */
    public function register($name = null, $entries = [], $attributes = [])
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
     * Registers a new menu container under the default name.
     *
     * @param array $entries
     * @param array $attributes
     * @throws MenuExistsException
     */
    public function registerDefault($entries = [], $attributes = [])
    {
        $this->register(null, $entries, $attributes);
    }

    /**
     * Returns a new html anchor.
     *
     * @param string, $routeName
     * @param string|null $title
     * @param array $parameters
     * @param array $attributes
     * @param array $additionalRouteNames
     * @param bool $isVisible
     * @return LinkRoute
     */
    public function linkRoute($routeName, $title = null, $parameters = [], $attributes = [], $additionalRouteNames = [], $isVisible = true)
    {
        return new LinkRoute($routeName, $title, $parameters, $attributes, $additionalRouteNames, $isVisible);
    }

    public function link($url, $title = null, $attributes = [], $isVisible = true)
    {
        return new Link($url, $title, $attributes, $isVisible);
    }

    /**
     * Returns a new html ul-like dropdown menu with sub-elements.
     *
     * @param array $entries
     * @param string $title
     * @param string|null $name
     * @param array $parameters
     * @param array $attributes
     * @param bool $isVisible
     * @return Dropdown
     */
    public function dropdown($entries, $title, $name = null, $parameters = [], $attributes = [], $isVisible = true)
    {
        return new Dropdown($entries, $title, $name, $parameters, $attributes, $isVisible);
    }

    /**
     * @param bool $isVisible
     * @return DropdownDivider
     */
    public function dropdownDivider($isVisible = true)
    {
        return new DropdownDivider($isVisible);
    }

    /**
     * @param string $title
     * @param bool $isVisible
     * @return DropdownHeader
     */
    public function dropdownHeader($title, $isVisible = true)
    {
        return new DropdownHeader($title, $isVisible);
    }

    /**
     * @param string $content
     * @param bool $isVisible
     * @return Content
     */
    public function content($content, $isVisible = true)
    {
        return new Content($content, $isVisible);
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
            return MenuHelper::purifyHtml(Html::decode($menu->render()));
        } else {
            throw new MenuNotFoundException($menuName);
        }
    }
}
