<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * Convert a callable into a closure object
 *
 * @param callable $f A callable to convert.
 *
 * @return callable Instance of the Closure class.
 */
function closurize(callable $f) : \Closure
{
    return ($f instanceof \Closure) ? $f : \Closure::fromCallable($f);
}
