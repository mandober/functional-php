<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * Very flexible currying. Supply arguments any which way.
 * @param callable $f A callable to finkel.
 * @return callable|mized Either a callable to gather more args,
 * or the final value.
 */
function finkel(callable $f, ...$x)
{
    $argc = \mandober\fu\arity($f);
    return $argc === count($x) ? $f(...$x) :
    (
        function (...$y) use ($f, $x, $argc) {
            return $argc === count($x) + count($y)
                ? $f(...$x, ...$y)
                : finkel($f, ...$x, ...$y)
            ;
        }
    )
    ;
}
