<?php

namespace Roots;

/**
 * Gets the value of an environment variable.
 *
 * @param  string $key
 * @param  mixed  $default
 * @return mixed
 *
 * @copyright Taylor Otwell
 * @license   https://github.com/laravel/framework/blob/v5.6.25/LICENSE.md MIT
 * @link      https://github.com/laravel/framework/blob/v5.6.25/src/Illuminate/Support/helpers.php#L597-L632 Original
 */
function env($key, $default = null)
{
    $value = getenv($key);
    if ($value === false) {
        return value($default);
    }

    switch (strtolower($value)) {
        case 'true':
        case '(true)':
            return true;

        case 'false':
        case '(false)':
            return false;

        case 'empty':
        case '(empty)':
            return '';

        case 'null':
        case '(null)':
            return;
    }

    if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[($valueLength - 1)] === '"') {
        return substr($value, 1, -1);
    }

    return $value;
}

/**
 * Return the default value of the given value.
 *
 * @param  mixed $value
 * @return mixed
 *
 * @copyright Taylor Otwell
 * @license   https://github.com/laravel/framework/blob/v5.6.25/LICENSE.md MIT
 * @link      https://github.com/laravel/framework/blob/v5.6.25/src/Illuminate/Support/helpers.php#L1143-L1152 Original
 */
function value($value)
{
    return $value instanceof Closure ? $value() : $value;
}

/**
 * Bind single callback to multiple filters
 *
 * @param  iterable $filters  List of filters
 * @param  callable $callback
 * @param  integer  $priority
 * @param  integer  $args
 * @return void
 */
function add_filters(iterable $filters, $callback, $priority = 10, $args = 2)
{
    $count = count($filters);
    array_map(
        '\add_filter',
        (array) $filters,
        array_fill(0, $count, $callback),
        array_fill(0, $count, $priority),
        array_fill(0, $count, $args)
    );
}

/**
 * Alias of add_filters
 *
 * @see add_filters
 * @param  iterable $actions  List of actions
 * @param  callable $callback
 * @param  integer  $priority
 * @param  integer  $args
 * @return void
 */
function add_actions(iterable $actions, $callback, $priority = 10, $args = 2)
{
    add_filters($actions, $callback, $priority, $args);
}