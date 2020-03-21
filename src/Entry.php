<?php

namespace Kaishiyoku\LaravelMenu;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class Entry
{
    /**
     * @var string
     */
    private $view;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $data;

    /**
     * @var bool
     */
    private $strict;

    /**
     * @param string $view
     * @param array $data
     * @param bool $strict
     */
    public function __construct(string $view, array $data, bool $strict = false)
    {
        $this->view = $view;
        $this->data = collect($data);
        $this->strict = $strict;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $this->data->put('isActive', $this->isCurrentRoute());

        return view($this->view, $this->data->toArray());
    }

    /**
     * @return bool
     */
    public function isCurrentRoute(): bool
    {
        $routeFn = $this->strict ? function ($name) { return $name; } : function ($name) {
            return Arr::first(explode('.', $name));
        };

        $currentRouteName = $routeFn(Route::currentRouteName());
        $routeName = $routeFn($this->data->get('route'));
        $additionalRoutes = $this->data->get('additionalRoutes') ?? collect();

        $additionalRouteNames = $additionalRoutes->mapWithKeys(function ($routeName) use ($routeFn) { return [$routeFn($routeName) => $routeFn($routeName)]; });

        return $routeName === $currentRouteName || $additionalRouteNames->has($currentRouteName);
    }
}
