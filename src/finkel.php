<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * The finkel decorates the supplied callable, making the way it receives arguments very flexible.
 *
 * Similarly to 'curry' we may pass a callable to finkel; after obtaining the callable's arity, the finkel keeps returning the so-called "argument collector" functions that collect more arguments, until all are gathered.
 *
 * If we supply the arguments in a one-by-one manner that would be no different then using the curry function: `finkel($quinary)(a)(b)(c)(d)(e)`.
 *
 *
 *
 * If, besides the callable in the first argument, we pass in ALL the needed
 * arguments, then we can just apply the callable, skipping the currying.
 * finkel(quinary, a, b, c, d, e) // all 5 args, just apply it
 *
 * If, besides the callable in the first argument, we pass in SOME of the
 * arguments, then we save them and perform the currying to get the rest.
 *   `finkel(quinary, a, b)` // save these 2, need to fetch 3 more
 *
 * The finkel decorates the supplied callable, relaxing the way it receives arguemnts. enabling it to receive its arguments in any manner, whether all-at-once (as in a regular call) or one-by-one (as in a curryied call), or in some way in between.
 *
 * This example shows the same process of currying that would be performed
 * with the `curry` function. However, the finkel relaxes this process,
 * enabling us to supply arguments in various ways.
 *   `finkel($quinary)(a)(b,c)(d,e)`
 *   `finkel($quinary)(a)(b,c,d,e)`
 *   `finkel($quinary,a,b)(c,d)(e)`
 *
 * Moreover, the empty calls to the collector function are ignored.
 *   `finkel($quinary)(a)()(b,c)()(d,e)`
 *   `finkel($quinary)(a)()(b)()(c)()(d)()(e)`
 *
 * @param callable  $f   Polyadic callable.
 * @param mixed  ...$xs  All or some of the arguments (optional).
 *
 * @return callable|mixed Either the "arg collector" func or the final value.
 *
 */

const finkel = '\mandober\fu\finkel';

function finkel(callable $f, ...$xs)
{
    $argc = (new \ReflectionFunction(
        $f instanceof \Closure ? $f : \Closure::fromCallable($f)
    ))->getNumberOfParameters();
    // $argc = arity($f);
    return $argc === count($xs)
        ? $f(...$xs)
        : (fn(...$ys) =>
            $argc === count($xs) + count($ys)
                ? $f(...$xs, ...$ys)
                : finkel($f, ...$xs, ...$ys)
          )
        ;
}

/*
$s = fn($a, $b, $c, $d) => $a + $b + $c + $d;
echo finkel($s)(1,2)()(3)()()(4), PHP_EOL;
*/
