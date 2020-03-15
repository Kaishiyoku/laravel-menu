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
     * @var string|null
     */
    private $containerClasses;

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
     * @return string|null
     */
    public function getContainerClasses(): ?string
    {
        return $this->containerClasses;
    }

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->entries = collect();
        $this->name = $name;
    }

    /**
     * @param string $containerClasses
     */
    public function addContainerClasses(string $containerClasses): void
    {
        $this->containerClasses = trim($this->containerClasses . ' ' . $containerClasses, ' ');
    }

    /**
     * @param string $route
     * @param string|null $title
     * @param bool $strict
     */
    public function link(string $route, ?string $title = null, bool $strict = false): void
    {
        $this->entries->add(new Entry('laravel-menu::link', compact('route', 'title'), $strict));
    }
}
