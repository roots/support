# Support

General-purpose helper functions used across Roots WordPress projects.

<a href="https://packagist.org/packages/roots/support"><img alt="Packagist Downloads" src="https://img.shields.io/packagist/dt/roots/support?label=downloads&colorB=2b3072&colorA=525ddc&style=flat-square"></a>
  <a href="https://twitter.com/rootswp"><img alt="Follow Roots" src="https://img.shields.io/badge/follow%20@rootswp-1da1f2?logo=twitter&logoColor=ffffff&message=&style=flat-square"></a>
  <a href="https://github.com/sponsors/roots"><img src="https://img.shields.io/badge/sponsor%20roots-525ddc?logo=github&style=flat-square&logoColor=ffffff&message=" alt="Sponsor Roots"></a>

## Support us

Roots is an independent open source org, supported only by developers like you. Your sponsorship funds [WP Packages](https://wp-packages.org/) and the entire Roots ecosystem, and keeps them independent. Support us by purchasing [Radicle](https://roots.io/radicle/) or [sponsoring us on GitHub](https://github.com/sponsors/roots) — sponsors get access to our private Discord.

## Requirements

- PHP 5.6+

## Installation

```bash
composer require roots/support
```

## Helpers

This package autoloads `helpers.php` and provides:

- `Roots\env($key, $default = null)`  
  Laravel-compatible environment lookup.  
  Deprecated when `\Illuminate\Support\Env` is available (it delegates there automatically).
- `Roots\value($value)`  
  Returns `$value()` if the value is a closure, otherwise returns the value unchanged.
- `Roots\add_filters(iterable $filters, $callback, $priority = 10, $args = 2)`  
  Registers one callback across many filter hooks.
- `Roots\remove_filters(iterable $filters, $callback, $priority = 10)`  
  Removes one callback across many filter hooks.
- `Roots\add_actions(iterable $actions, $callback, $priority = 10, $args = 2)`  
  Alias of `add_filters`.
- `Roots\remove_actions(iterable $actions, $callback, $priority = 10)`  
  Alias of `remove_filters`.
- `Roots\wp_die($message, $subtitle = '', $title = '', $footer = '')`  
  Wrapper around WordPress `wp_die()` with Roots-flavored defaults.

## Usage

```php
<?php

use function Roots\add_actions;
use function Roots\env;

$apiKey = env('API_KEY', '');

add_actions(
    ['init', 'wp_loaded'],
    function () use ($apiKey) {
        if (! $apiKey) {
            return;
        }

        // Do work...
    }
);
```

## Community

Keep track of development and community news.

- Join us on Discord by [sponsoring us on GitHub](https://github.com/sponsors/roots)
- Join us on [Roots Discourse](https://discourse.roots.io/)
- Follow [@rootswp on Twitter](https://twitter.com/rootswp)
- Follow the [Roots Blog](https://roots.io/blog/)
- Subscribe to the [Roots Newsletter](https://roots.io/subscribe/)

