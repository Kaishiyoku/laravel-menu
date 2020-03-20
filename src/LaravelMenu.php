<?php

namespace Kaishiyoku\LaravelMenu;

use Kaishiyoku\HtmlPurifier\HtmlPurifier;
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
        $htmlPurifier = new HtmlPurifier();
        $menuContainer = $this->menus->get($name);
        $isHtmlPurifierDisabled = $menuContainer->isHtmlPurifierDisabled();

        if ($menuContainer === null) {
            throw new MenuNotFoundException($name);
        }

        $containerClasses = $menuContainer->getContainerClasses()->toArray();

        $content = $menuContainer->getEntries()->reduce(function (string $carry, Entry $entry) use ($isHtmlPurifierDisabled, $htmlPurifier) {
            return $carry . ($isHtmlPurifierDisabled ? $entry->render() : $htmlPurifier->purify($entry->render()));
        }, '');

        return view('laravel-menu::menu', compact('containerClasses', 'content'));
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
