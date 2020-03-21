<?php

namespace Kaishiyoku\LaravelMenu;

use GrahamCampbell\Security\Facades\Security;
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
    public function register(string $name = 'main'): MenuContainer
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
    public function render(string $name = 'main'): string
    {
        /*** @var MenuContainer $menuContainer */
        $menuContainer = $this->menus->get($name);
        $isXssFilterDisabled = $menuContainer->isXssFilterDisabled();

        if ($menuContainer === null) {
            throw new MenuNotFoundException($name);
        }

        $classNames = $menuContainer->getClassNames()->toArray();

        $content = $menuContainer->getEntries()->reduce(function (string $carry, Entry $entry) use ($isXssFilterDisabled) {
            return $carry . ($isXssFilterDisabled ? $entry->render() : Security::clean($entry->render()));
        }, '');

        return view('laravel-menu::menu', compact('classNames', 'content'));
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function exists(string $name): bool
    {
        return $this->menus->has($name);
    }
}
