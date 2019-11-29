<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * foldl folds an array from left.
 *
 * @param callable $reducer Reducer is a binary function that is fed
 * the accumulator and the current element.
 * @param mixed $acc The initial value of accumulator.
 * @param array $arr The array to reduce.
 *
 * @return mixed The reduced value.
 *
 * @todo further feed reducer with optional key, array
 */
function foldl($acc, callable $reducer, array $items)
{
    // if array empty, return acc
    if (count($items) == 0) return $acc;

    foreach($items as $item) {
        $acc = $reducer($acc, $item);
    }
    return $acc;
}
