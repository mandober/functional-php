<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * HOF that composes callables, returning the callable that expects an argument.
 *
 * @param callable ...$funcs Two or more callables.
 * @return callable Composed callables that expect to be fed the arg.
 *
 * In this version of compose the expected argument is singular, that
 * is, the first callable expects an argumnt that is a single value.
 * The subsequent callables also expect a single argument, therefore
 * each callable should take only one argument (and return one value).
 */
const compose = '\mandober\fu\compose';

function compose(callable ...$fs)
{
    return \mandober\fu\foldl(
        fn($a) => $a,                               // accumulator (id)
        fn($acc, $f) => fn($arg) => $f($acc($arg)), // reducer
        $fs = \array_reverse($fs)                   // array to reduce
    );
}
