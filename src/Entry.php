<?php

namespace Kaishiyoku\LaravelMenu;

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
     * @param string $view
     * @param array $data
     */
    public function __construct(string $view, array $data)
    {
        $this->view = $view;
        $this->data = collect($data);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $this->data->put('isActive', Route::currentRouteName() === $this->data->get('route'));

        return view($this->view, $this->data->toArray());
    }
}
