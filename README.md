![Maintenance](https://img.shields.io/maintenance/yes/2018.svg)
 ![Packagist](https://img.shields.io/packagist/v/kaishiyoku/laravel-menu.svg) ![Packagist](https://img.shields.io/packagist/dt/kaishiyoku/laravel-menu.svg)

Laravel 5 menus with automatic CSS highlighting

Table of contents
=================

  * [Upgrade notices](#upgrade-notices)
  * [General](#general)
  * [Important Information](#important-information)
  * [Installation](#installation)
    * [Composer](#composer)
    * [Laravel Configuration](#laravel-configuration)
  * [Usage](#usage)
  * [Look & Feel](#look--feel)
    * [Bootstrap 4](#bootstrap-4)
  * [License](#license)
  * [Author](#author)

Upgrade notices
===============

Version 1.* to 2.*
------------------
  * `Menu::link` is now `Menu::linkRoute`

General
=======
Documentation: http://kaishiyoku.github.io/laravel-menu/

This package helps defining and rendering menu structures.
The main feature is the CSS highlighting of the active page.


Important Information
=====================
Please note that your routes must be named.


Installation
============

Composer
--------
Add ```"kaishiyoku/laravel-menu": "1.*"``` to your **composer.json**
by running ```composer require kaishiyoku/laravel-menu```.

Update your dependencies by running ```composer update```.

Laravel Configuration
---------------------
Add ```Kaishiyoku\Menu\MenuServiceProvider::class,``` to the **providers** array  
and ```'Menu' => Kaishiyoku\Menu\Facades\Menu::class,``` to the **aliases** array in **app/config/app.php**.

Usage
=====
Create the file at **app/Http/menus.php** and build up a new menu inside it (this only works for simple menus when you don't need any Laravel Facades or other things which have to be there at the request chain first).

or

Create a **app/Http/Middleware/Menus.php** middleware and add it to a new middleware group 'menus'. Please don't forget to add the newly created middleware group to your routes.php definitions.

**Example \App\Http\Middleware\Menus.php:**
```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Kaishiyoku\Menu\Facades\Menu;

class Menus
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Define your menus here

        return $next($request);
    }
}
```

**Edited \App\Http\Kernel:**
```php
protected $middlewareGroups = [
    'web' => [
        // [...]
    ],

    'menus' => [
        \App\Http\Middleware\Menus::class,
    ],

    'api' => [
        // [...]
    ],
 ];
```

Update your routes so that they use the new middleware *menus*.

**Example web.php**
```php
<?php

Route::group(['middleware' => ['menus']], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/about', 'HomeController@about')->name('home.about');
});
```

**Example menus.php:**
```php
<?php

Menu::registerDefault([
    Menu::linkRoute('home.index', 'Landing Page'),
    Menu::linkRoute('home.news', 'News'),
    Menu::linkRoute('home.about', 'About'),
    Menu::dropdown([
        Menu::linkRoute('content.users', 'Users'),
        Menu::linkRoute('content.articles', 'Articles'),
        Menu::dropdownDivider(),
        Menu::dropdownHeader('More Content'),
        Menu::linkRoute('content.blog', 'Blog')
    ], 'Content'),
    Menu::link('https://www.google.com', 'Google'),
], ['class' => 'nav navbar-nav']);

Menu::register('navbar-right', [
    Menu::linkRoute('auth.login', 'Login'),
    Menu::linkRoute('auth.register', 'Register')
], ['class' => 'nav navbar-nav navbar-right']);

Route::group(['middleware' => ['web']], function () {
    Route::get('/index', function() {
        return view('home.index'); // TODO
    })->name('home.index');

    Route::get('/news', function() {
        return view('home.index'); // TODO
    })->name('home.news');

    Route::get('/about', function() {
        return view('home.index'); // TODO
    })->name('home.about');

    Route::get('/content/users', function() {
        return view('home.index'); // TODO
    })->name('content.users');

    Route::get('/content/articles', function() {
        return view('home.index'); // TODO
    })->name('content.articles');

    Route::get('/content/articles/{id}', function($id) {
        return view('home.index'); // TODO
    })->name('content.show_article');

    Route::get('/auth/login', function() {
        return view('home.index'); // TODO
    })->name('auth.login');

    Route::get('/auth/register', function() {
        return view('home.index'); // TODO
    })->name('auth.register');
});
```

To display the configured menus you have to call the render function somewhere in your Blade template:
```html
<div id="navbar" class="collapse navbar-collapse">
    {!! Menu::render() !!}

    {!! Menu::render('navbar-right') !!}
</div>
```

If the render() method is being called without parameters the default menu will be rendered.
The menus must have unique names, otherwise an exception will be thrown.

The result would look like this:
![Screenshot 1](https://raw.githubusercontent.com/Kaishiyoku/laravel-menu/screenshots/screenshot1.png "Basic menu implementation")

If you have any issues feel free to open a ticket.


Look & Feel
===========
The default look and feel is based on Bootstrap 3, but you can change some of the CSS classes and attributes from outside (see the code snippets above).

Bootstrap 4
-----------
Since version 1.4.0 Bootstrap 4 support has been added. To make it work you have to set the new config object for your menus before setting them up:

```php
Menu::setConfig(Config::forBootstrap4());

// your menus go here
Menu::registerDefault([]); // ...
```

License
=======
MIT (https://github.com/Kaishiyoku/laravel-menu/blob/master/LICENSE)


Author
======
Twitter: [@kaishiyoku](https://twitter.com/kaishiyoku)  
Website: www.andreas-wiedel.de
