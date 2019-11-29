<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * Compose two or more callables.
 *
 * @param callable ...$funcs Two or more callables.
 * @return callable Composed callables that expect to be fed the arg.
 *
 * In this version of compose the expected argument is singular, that
 * is, the first callable expects an argumnt that is a single value.
 * The subsequent callables also expect a single argument, therefore
 * each callable should take only one argument (and return one value).
 */
function compose(callable ...$funcs)
{
    return \mandober\fu\foldl(
        // accumulator
        fn($a) => $a,
        // binary reducer
        fn($acc, $f) => fn($x) => $f($acc($x)), // $x is the arg
        // array to reduce
        $fs = \array_reverse($funcs)
    );
}
