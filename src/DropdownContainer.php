<?php

namespace Kaishiyoku\LaravelMenu;

use Illuminate\Support\Str;

class DropdownContainer
{
    /**
     * @var \Illuminate\Support\Collection
     */
    private $entries;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getEntries(): \Illuminate\Support\Collection
    {
        return $this->entries;
    }

    /**
     * @param string $name
     */
    public function __construct()
    {
        $this->entries = collect();
    }

    /**
     * @param string $route
     * @param string|null $title
     * @return self
     */
    public function link(string $route, ?string $title = null): self
    {
        $routes = collect(explode(',', trim($route, ',')));

        $this->entries->add(new Entry('laravel-menu::dropdown_link', [
            'route' => $routes->first(),
            'additionalRoutes' => $routes->skip(1),
            'title' => $title,
        ], true));

        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function header(string $title): self
    {
        $this->entries->add(new Entry('laravel-menu::dropdown_header', [
            'title' => $title,
        ]));

        return $this;
    }

    /**
     * @return $this
     */
    public function divider(): self
    {
        $this->entries->add(new Entry('laravel-menu::dropdown_divider'));

        return $this;
    }
}
