<?php declare(strict_types=1);

namespace mandober\fu;


/**
 * Curry a polyadic callable. Get args strictly one-by-one.
 * fn($a,$b,$c) -> fn($a) => fn($b) => fn($c)
 * curry :: ((a, b) -> c) -> a -> b -> c
 *
 * One-by-one means each returned function collects precisely one
 * argument per call. If more are given per call, they are ignored.
 * For a more relaxed version of curry, @see `finkel`.
 *
 * For example, if `f` is a binary function, then `curry(f)(3)(5)` is
 * ok; if `curry(f)(3,33)(5,55,555)` only the first argument per each
 * call is collected, the others are ignored. So, in the first call
 * `(3,33)` only 3 is collected while 33 is ignored; similarly, the
 * second call, `(5,55,555)`, collects 5, ignoring 55 and 555. With
 * both arguments collected, `f` is then applied to `(3,5)` or, more
 * precisely, to `(3)(5)` since `f` was curryied.
 */
function curry(callable $f) : callable
{
    $_curry = function($f, $args = []) use (&$_curry)
    {
        $argc = \mandober\fu\arity($f);
        //$argc = (new \ReflectionFunction($f))->getNumberOfParameters();
        if ($argc < 2) return $f;
        return function ($x) use ($f, $argc, $args, $_curry)
        {
            $args[] = $x;
            return $argc === count($args)
                ? $f(...$args)
                : $_curry($f, $args);
        };
    };
    return $_curry($f);
}
