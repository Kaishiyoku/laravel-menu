<?php

namespace Kaishiyoku\LaravelMenu;

class MenuContainer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $entries;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

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
    public function __construct(string $name)
    {
        $this->entries = collect();
        $this->name = $name;
    }

    public function link(string $route, ?string $title = null)
    {
        $this->entries->add(new Entry('laravel-menu::link', compact('route', 'title')));
    }
}
