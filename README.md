Laravel 5 menus with automatic CSS highlighting

Table of contents
=================

  * [General](#general)
  * [Important Information](#important-information)
  * [Installation](#installation)
    * [Composer](#composer)
    * [Laravel Configuration](#laravel-configuration)
  * [Usage](#usage)
  * [Look & Feel](#look--feel)


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
Build up a new menu in the **app/Http/routes.php** file (or at any other place where it is being loaded before a Laravel request is being exectued).

**Example routes.php:**
```php
<?php

Menu::addDefault([
    Menu::link('home.index', 'Landing Page'),
    Menu::link('home.news', 'News'),
    Menu::link('home.about', 'About'),
    Menu::dropdown([
        Menu::link('content.users', 'Users'),
        Menu::link('content.articles', 'Articles'),
        Menu::dropdownDivider(),
        Menu::dropdownHeader('More Content'),
        Menu::link('content.blog', 'Blog')
    ], 'Content')
], ['class' => 'nav navbar-nav']);

Menu::add('navbar-right', [
    Menu::link('auth.login', 'Login'),
    Menu::link('auth.register', 'Register')
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
![Screenshot 1](https://github.com/Kaishiyoku/laravel-menu/blob/master/screenshots/screenshot1.png "Basic menu implementation")


Look & Feel
===========
The default look and feel is based on Bootstrap 3, but you can change some of the CSS classes and attributes from outside (see the code snippets above).

If you have any issues feel free to open a ticket.
