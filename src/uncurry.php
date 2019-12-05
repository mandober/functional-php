<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * uncurry2 - Uncurry a binary curryied callable.
 */
const uncurry2 = '\mandober\fu\uncurry2';

function uncurry2(callable $f) : callable
{
    return fn($a,$b) => $f($a)($b);
}


/**
 * uncurry3 - Uncurry a ternary curryied callable.
 */
const uncurry3 = '\mandober\fu\uncurry3';

function uncurry3(callable $f) : callable
{
    return fn($a,$b,$c) => $f($a)($b)($c);
}


/**
 * uncurry4 - Uncurry a quaternary curryied callable.
 */
const uncurry4 = '\mandober\fu\uncurry4';

function uncurry4(callable $f) : callable
{
    return fn($a,$b,$c,$d) => $f($a)($b)($c)($d);
}


/**
 * uncurry5 - Uncurry a quinary curryied callable.
 */
const uncurry5 = '\mandober\fu\uncurry5';

function uncurry5(callable $f) : callable
{
    return fn($a,$b,$c,$d,$e) => $f($a)($b)($c)($d)($e);
}
