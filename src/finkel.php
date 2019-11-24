<?php declare(strict_types=1);

namespace mandober\fprelude;


function finkel($f, ...$x)
{
    $a = (new \ReflectionFunction($f))->getNumberOfParameters();
    return $a === count($x) ? $f(...$x) :
    (
        function(...$y) use ($f, $x, $a)
        {
            return $a === count($x) + count($y)
                ? $f(...$x, ...$y)
                : finkel($f, ...$x, ...$y)
            ;
        }
    )
    ;
}
