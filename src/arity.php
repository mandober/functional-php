<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * Get the number of parameters of a callable.
 *
 * @param callable $f A callable.
 *
 * @return int The number of parameters as integer.
 *
 * Callable types:
 * - string containg 'label' (named function)
 * - string containg 'static_class::method_label' (named function)
 * - array where the first element is string (named function)
 * - object of Closure class
 * - object of a class with the __invoke method
 */
function arity(callable $f) : int
{
    if (!$f instanceof \Closure) {
        $f = \mandober\fu\closurize($f);
    }
    return (new \ReflectionFunction($f))->getNumberOfParameters();
}
