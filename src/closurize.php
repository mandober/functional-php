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
    if (!$f instanceof \Closure) {
        return \Closure::fromCallable($f);
    }

    return $f;
}
