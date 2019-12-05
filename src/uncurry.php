<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * uncurry2 - Uncurry a binary curryied callable.
 */
function uncurry2(callable $f) : callable
{
    return fn($a,$b) => $f($a)($b);
}

/**
 * uncurry3 - Uncurry a ternary curryied callable.
 */
function uncurry3(callable $f) : callable
{
    return fn($a,$b,$c) => $f($a)($b)($c);
}

/**
 * uncurry4 - Uncurry a quaternary curryied callable.
 */
function uncurry4(callable $f) : callable
{
    return fn($a,$b,$c,$d) => $f($a)($b)($c)($d);
}

/**
 * uncurry5 - Uncurry a quaternary curryied callable.
 */
function uncurry5(callable $f) : callable
{
    return fn($a,$b,$c,$d,$e) => $f($a)($b)($c)($d)($e);
}
