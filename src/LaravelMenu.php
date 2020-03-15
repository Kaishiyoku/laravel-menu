<?php

namespace Kaishiyoku\LaravelMenu;

use Kaishiyoku\LaravelMenu\Exceptions\MenuExistsException;
use Kaishiyoku\LaravelMenu\Exceptions\MenuNotFoundException;

class LaravelMenu
{
    /**
     * @var \Illuminate\Support\Collection<MenuContainer>
     */
    private $menus;

    /**
     * LaravelMenu constructor.
     */
    public function __construct()
    {
        $this->menus = collect();
    }

    /**
     * @param string $name
     * @return MenuContainer
     * @throws MenuExistsException
     */
    public function register(string $name): MenuContainer
    {
        if ($this->menus->get($name) !== null) {
            throw new MenuExistsException($name);
        }

        $menuContainer = new MenuContainer($name);

        $this->menus->put($name, $menuContainer);

        return $menuContainer;
    }

    /**
     * @param string $name
     * @return string
     * @throws MenuNotFoundException
     */
    public function render(string $name): string
    {
        $menuContainer = $this->menus->get($name);

        if ($menuContainer === null) {
            throw new MenuNotFoundException($name);
        }

        $content = $menuContainer->getEntries()->reduce(function (string $carry, Entry $entry) {
            return $carry . $entry->render();
        }, '');

        return view('laravel-menu::menu', compact('content'));
    }
}
