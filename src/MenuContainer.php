<?php

namespace Kaishiyoku\LaravelMenu;

use Illuminate\Support\Str;

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
     * @var \Illuminate\Support\Collection
     */
    private $classNames;

    /**
     * @var bool
     */
    private $isXssFilterDisabled = false;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isXssFilterDisabled(): bool
    {
        return $this->isXssFilterDisabled;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getEntries(): \Illuminate\Support\Collection
    {
        return $this->entries;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getClassNames(): \Illuminate\Support\Collection
    {
        return $this->classNames;
    }

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->entries = collect();
        $this->name = $name;
        $this->classNames = collect();
    }

    /**
     * @param string|array $classNames
     * @return self
     */
    public function addClassNames($classNames): self
    {
        collect(explode(' ', classNames($classNames)))->each(function ($className) {
            $this->classNames->add($className);
        });

        return $this;
    }

    /**
     * @return self
     */
    public function disableXssFilter(): self
    {
        $this->isXssFilterDisabled = true;

        return $this;
    }

    /**
     * @param string $route
     * @param string|null $title
     * @param bool $strict
     * @return self
     */
    public function link(string $route, ?string $title = null, bool $strict = false): self
    {
        $this->entries->add(new Entry('laravel-menu::link', compact('route', 'title'), $strict));

        return $this;
    }

    /**
     * @param string $title
     * @param array $links
     * @return $this
     */
    public function dropdown(string $title, array $links): self
    {
        $id = Str::slug($title);
        $linkEntries = collect($links)->map(function ($title, $route) {
            return $this->dropdownLink($route, $title);
        });
        $dropdownIsActiveFn = function () use ($linkEntries) {
            return $linkEntries->reduce(function (bool $carry, Entry $linkEntry) {
                return $carry or $linkEntry->isCurrentRoute();
            }, false);
        };

        $this->entries->add(new Entry('laravel-menu::dropdown', compact('id', 'title', 'linkEntries', 'dropdownIsActiveFn')));

        return $this;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function text(string $text): self
    {
        $this->entries->add(new Entry('laravel-menu::text', compact('text')));

        return $this;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function content(string $content): self
    {
        $this->entries->add(new Entry('laravel-menu::content', compact('content')));

        return $this;
    }

    /**
     * @param bool $condition
     * @param string $route
     * @param string|null $title
     * @param bool $strict
     * @return self
     */
    public function linkIf(bool $condition, string $route, ?string $title = null, bool $strict = false): self
    {
        if ($condition) {
            $this->link($route, $title, $strict);
        }

        return $this;
    }

    /**
     * @param bool $condition
     * @param string $title
     * @param array $links
     * @return $this
     */
    public function dropdownIf(bool $condition, string $title, array $links): self
    {
        if ($condition) {
            $id = Str::slug($title);
            $linkEntries = collect($links)->map(function ($title, $route) {
                return $this->dropdownLink($route, $title);
            });
            $dropdownIsActiveFn = function () use ($linkEntries) {
                return $linkEntries->reduce(function (bool $carry, Entry $linkEntry) {
                    return $carry or $linkEntry->isCurrentRoute();
                }, false);
            };

            $this->entries->add(new Entry('laravel-menu::dropdown', compact('id', 'title', 'linkEntries', 'dropdownIsActiveFn')));
        }

        return $this;
    }

    /**
     * @param bool $condition
     * @param string $text
     * @return $this
     */
    public function textIf(bool $condition, string $text): self
    {
        if ($condition) {
            $this->entries->add(new Entry('laravel-menu::text', compact('text')));
        }

        return $this;
    }

    /**
     * @param bool $condition
     * @param string $content
     * @return $this
     */
    public function contentIf(bool $condition, string $content): self
    {
        if ($condition) {$this->entries->add(new Entry('laravel-menu::content', compact('content')));
        }

        return $this;
    }

    /**
     * @param string $route
     * @param string|null $title
     * @return Entry
     */
    private function dropdownLink(string $route, ?string $title = null): Entry
    {
        return new Entry('laravel-menu::dropdown_link', compact('route', 'title'), true);
    }
}
