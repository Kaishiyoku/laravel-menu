![Maintenance](https://img.shields.io/maintenance/yes/2020.svg)
![Packagist](https://img.shields.io/packagist/v/kaishiyoku/laravel-menu.svg) ![Packagist](https://img.shields.io/packagist/dt/kaishiyoku/laravel-menu.svg)

Laravel menus with automatic CSS highlighting

Table of contents
=================

  * [Version info](#version-info)
  * [Minimum requirements](#minimum-requirements)
  * [General](#general)
  * [Important Information](#important-information)
  * [Installation](#installation)
    * [Composer](#composer)
    * [Laravel Configuration](#laravel-configuration)
  * [Usage](#usage)
  * [Look & Feel](#look--feel)
  * [License](#license)
  * [Author](#author)


Version info
============

Version 4 is a complete rework of the package.
Thus breaking changes were introduced.

Minimum requirements
====================

* PHP >=7.2.5
* Laravel ^6.0


General
=======

This package helps defining and rendering menu structures in Laravel.
The main feature is the CSS highlighting of the active page.
The package is coupled to Laravel and can't be used standalone.


Important Information
=====================
Please note that your routes must be named.


Installation
============

Composer
--------
Add ```"kaishiyoku/laravel-menu": "^4.0"``` to your **composer.json**
by running ```composer require "kaishiyoku/laravel-menu": "^4.0"```.

Update your dependencies by running ```composer update```.

Laravel Configuration
---------------------

The package supports Laravel auto-discovery but if you want you can add ```Kaishiyoku\LaravelMenu\ServiceProvider::class,``` to the **providers** array  
and ```'Menu' => Kaishiyoku\LaravelMenu\Facade::class,``` to the **aliases** array in **app/config/app.php**.


Usage
=====

* generate a new middleware by using `php artisan make:middleware Menus`
* add `\App\Http\Middleware\Menus::class,` to the Http Kernel in `$middlewareGroups` > `'web'`
* add your menus to the `handle()` method in your Menus middleware

**Example \App\Http\Middleware\Menus.php:**
```php
<?php

namespace App\Http\Middleware;

use Closure;

class Menus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // your menus go here

        return $next($request);
    }
}
```

**Edited \App\Http\Kernel:**
```php
[...]

protected $middlewareGroups = [
    'web' => [
        // [...]
        \App\Http\Middleware\Menus::class,
    ],
 ];

[...]
```

To display the configured menus you have to call the render function somewhere in your Blade template:

```html
<div id="navbar" class="collapse navbar-collapse">
    {!! \LaravelMenu::render() !!}

    {!! \LaravelMenu::render('navbar-right') !!}
</div>
```

If the render() method is being called without parameters the default menu will be rendered.
The menus must have unique names, otherwise an exception will be thrown.

The result would look like this:
![Screenshot 1](https://i.imgur.com/LLYqa8k.png "Basic menu implementation")

If you have any issues feel free to open a ticket.

Sample
------

```php
\LaravelMenu::register()
    ->addClassNames(['mr-auto'])
    ->link('users.index', 'All users')
    ->dropdown('Comments', [
        'comments.index' => 'All',
        'comments.create' => 'Create',
    ]);
```

You can also use a condition whether the given menu entry should be rendered or not, example:

```php
\LaravelMenu::register()
    ->linkIf(auth()->check(), 'users.index, 'All users')
    ->dropdownIf(auth()->check(), 'Comments', [
        'comments.index' => 'All',
        'comments.create' => 'Create',
    ]);
```

For dropdown links you can define multiple routes so that a given link will be highlighted when one of those routes is being visited. The first route will be the route to where the link goes:

```php
\LaravelMenu::register()
    ->dropdown('Comments', \LaravelMenu::dropdownContainer()
        ->header('General')
        ->link('comments.index,comments.top,comments.show', 'All')
        ->divider()
        ->link('comments.create', 'Create')
);
```

Available methods
-----------------

* `addClassNames(string|array $classNames)` adds CSS class names to the menu container
* `disableXssFilter()` disables the integrated XSS filter
* `link(string $route, ?string $title = null, bool $strict = false)`
  * you can also use a comma-seperated $route list (eg. `entries.index,entries.create,entries.create`)
* `dropdown(string $title, DropdownContainer $dropdownContainer)`
  * The DropdownContainer class has the following methods available:
  * `link(string $route, ?string $title = null)`
  * `header(string $title)`
  * `divider()`
* `text(string $text)`
* `content(string $content)`

➡ Every container method can also be called with a condition. Only if this condition is true the container will be rendered. (eg. `linkIf(bool $condition, string $route, ?string $title = null, bool $strict = false)`)

MenuContainer: `linkIf`, `dropdownIf`, `textIf`, `contentIf`

DropdownContainer: `linkIf`, `headerIf`, `dividerIf`


Look & Feel
===========

Currently the default look and feel is based on Bootstrap 4.

You can customize every Blade component by publishing them (`php artisan vendor:publish --provider="Kaishiyoku\LaravelMenu\ServiceProvider"`)

License
=======

MIT (https://github.com/Kaishiyoku/laravel-menu/blob/master/LICENSE)


Author
======
Twitter: [@kaishiyoku](https://twitter.com/kaishiyoku)  
Website: https://andreas-wiedel.de
