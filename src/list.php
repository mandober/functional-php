<?php declare(strict_types=1);

namespace mandober\fu;


/**
 * cons :: a -> [a] -> [a]
 */
function cons($x, array $xs) : array
{
    return [$x, ...$xs];
}

/**
 * head :: [a] -> a
 */
function head(array $xs)
{
    if (count($xs) === 0) throw new \OutOfBoundsException("Array is empty!");
    [$x,] = $xs;
    return $x;
}


/**
 * tail :: [a] -> [a]
 */
function tail(array $xs) : array
{
    if (count($xs) < 2) return [];
    return (fn($y, ...$ys) => $ys)(...$xs);
}


/**
 * last :: [a] -> a
 */
function last(array $xs)
{
    [$x] = $xs;
    return $x;
}

/**
 * init :: [a] -> [a]
 */
function init(array $xs) : array
{
    return [$x, ];
}
