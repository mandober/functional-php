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
        fn($a) => $a,                               // accumulator
        fn($acc, $f) => fn($arg) => $f($acc($arg)), // binary reducer
        $fs = \array_reverse($funcs)                // array to reduce
    );
}
