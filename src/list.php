<?php declare(strict_types=1);

namespace mandober\fu;


/**
 * cons :: a -> [a] -> [a]
 */
const cons = '\mandober\fu\cons';

function cons($x, array $xs) : array
{
    return [$x, ...$xs];
}


/**
 * head :: [a] -> a
 */
const head = '\mandober\fu\head';

function head(array $xs)
{
    if (count($xs) === 0) throw new \OutOfBoundsException("Array is empty!");
    [$x,] = $xs;
    return $x;
}


/**
 * tail :: [a] -> [a]
 */
const tail = '\mandober\fu\tail';

function tail(array $xs) : array
{
    if (count($xs) < 2) return [];
    return (fn($y, ...$ys) => $ys)(...$xs);
}
