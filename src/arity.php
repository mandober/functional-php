<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * Get the number of parameters of a callable.
 *
 * @param callable $f A callable.
 * @return int The number of parameters as integer.
 *
 * Callable types are special forms of strings, arrays, objects
 */
const arity = '\mandober\fu\arity';

function arity(callable $f) : int
{
    return (new \ReflectionFunction(
        ($f instanceof \Closure) ? $f : \Closure::fromCallable($f)
    ))->getNumberOfParameters();
}
