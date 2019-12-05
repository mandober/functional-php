<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * Closurize and I'll kiss you, tomorrow I'll miss you.
 *
 * @param callable $f A callable to convert.
 * @return callable Instance of the Closure class.
 */
const closurize = '\mandober\fu\closurize';

function closurize(callable $f) : \Closure
{
    return ($f instanceof \Closure) ? $f : \Closure::fromCallable($f);
}
