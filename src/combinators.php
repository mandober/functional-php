<?php declare(strict_types=1);

// Lambda Calculus
// Combinators as PHP arrow functions (PHP 7.4+)
// Only K and S are essential, others can be derived from them


/**
 * Idiotbird AKA identity
 * λα.α
 * f(x) -> x
 * id :: a -> a
 */
$I = fn($a) => a;

/**
 * Kester AKA true, fst
 * λαβ.α
 * f(x)(y) -> x
 * kester :: a -> b -> a
 */
$K = fn($x) => fn($y) => x;

/**
 * Starling
 * λϕγα.ϕα(γα)
 * f(x), g(x), x -> f(x)(g(x))
 */
$S = fn($f) => fn($g) => fn($x) => $f($x)($g($x));

/**
 * Bluebird AKA flip
 * λϕαβ.ϕβα
 *
 * f(x)(y) -> f(y)(x)
 * flip :: (a -> b) -> (b -> a)
 */
$B = fn($f) => fn($x) => fn($y) => $f($y)($x);

/**
 * Mockingbird AKA ω (o-mega-micron), self-application
 * λω.ωω
 */
$M = fn($f) => $f($f);

/**
 * Y combinator
 *
 */
$Y = fn($g) =>
    (
        fn($f) => $f($f)
    )(
        fn($f) => $g( fn($x) => $f($f)($x) )
    );
