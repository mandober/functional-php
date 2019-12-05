<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * foldl folds an array from left.
 *
 * @param callable $reducer A binary function that is fed the accumulator and the current element's value.
 * @param mixed $acc The initial value of accumulator.
 * @param array $arr The array to reduce.
 * @return mixed The reduced value.
 */
const foldl = '\mandober\fu\foldl';

function foldl($acc, callable $reducer, array $items)
{
    // if array empty, return acc
    if (count($items) == 0) return $acc;

    foreach($items as $item) {
        $acc = $reducer($acc, $item);
    }
    return $acc;
}
