<?php declare(strict_types=1);

namespace mandober\fu;

require("./foldr.php");
use const \mandober\fu\foldr;

/**
 * Flips the order of params of a binary callable.
 *
 * flip :: ((a, b) -> c) -> ((b, a) -> c)
 *
 * f :: (a, b) -> c
 *
 * flip(f) :: ((b, a) -> c)
 *
 */
const flip = '\mandober\fu\flip';

function flip(callable $f) : callable
{
    return fn($b, $a) => $f($a, $b);
}


/**
 * Flips the order of params of a "binary" curryied function.
 *
 * flip_c :: (a -> b -> c) -> (b -> a -> c)
 *
 * curryied :: a -> b -> c
 * curryied = fn(a) => fn(b) => a^b
 * curryied(2)(5) // 2^5=32
 *
 * flip(curryied) :: b -> a -> c
 * flip(curryied)(2)(5) // 5^2=25
 *
 * flip_c === flip . curry
 */
const flip_c = '\mandober\fu\flip_c';

function flip_c(callable $f) : callable
{
    return fn($b) => fn($a) => $f($a)($b);
}



/**
 * Takes a ternary callable and flips its first two args.
 *
 * flip_ :: ((f,a,xs) -> c) -> ((a,f,xs) -> c)
 */
const flip_ = '\mandober\fu\flip_';

function flip_(callable $f)
{
    // return fn($b) => fn($a) => fn($c) => $f($a)($b)($c);
    return fn($a,$b,$c) => $f($b,$a,$c);
}


/*
$cb = fn($a, $b) => $a+$b;
$ar = [1,2,3,4];

$r1 = foldr(0, $cb, $ar);
echo $r1, PHP_EOL;


$fdr = flip_(foldr);
// print_r($fdr);

// pass binary to foldr
$r = $fdr(fn($a, $b) => $a+$b, 0, [1,2,3,4]);
print_r($r);

// pass curryied "binary" to foldr
// $s = $fdr(fn($a) => fn($b) => $a+$b, 0, [1,2,3,4]);
// echo $s;
*/
