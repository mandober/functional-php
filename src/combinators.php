<?php declare(strict_types=1);

namespace mandober\fu;


/*
Combinators
===========
Combinators as PHP arrow functions (PHP 7.4+)

http://www.angelfire.com/tx4/cus/combinator/birds.html
https://blog.lahteenmaki.net/combinator-birds.html
http://dkeenan.com/Lambda/index.htm
http://hackage.haskell.org/package/data-aviary-0.4.0/docs/Data-Aviary-Birds.html

K and S for the minimal essential set - all
other combinators can be derived from K and S

Lambda Calculus associativity:
* abstraction is right-associated:
    λabc.abc ≡ λa.λb.λc.abc ≡ λa.[λb.{λc.(abc)}]
* application is left-associated:
    abcd ≡ [(ab)c]d
* abstraction and application:
    λabc.abc ≡ λa.λb.λc.(ab)c ≡ λa.[λb.{λc.(ab)c}]
*/


/**
 * I combinator: Idiot bird, identity, id
 * Combinator     : SKK
 * SK Combinator  : ((SK)K)
 * Lambda Calculus: λa.a
 * Haskell        : id :: a -> a
 * Imperative     : f(x) -> x
 */
$I = fn($a) => a;


/**
 * K combinator: Kester, true, (fst)
 * Combinator     : K
 * SK Combinator  : K
 * Lambda Calculus: λab.a
 * Haskell        : kester :: a -> b -> a
 * Imperative     : f(x)(y) -> x
 */
$K = fn($x) => fn($y) => x;

/**
 * Starling
 * λϕγα.ϕα(γα)
 * f(x), g(x), x -> f(x)(g(x))
 */
$S = fn($f) => fn($g) => fn($x) => $f($x)($g($x));

/**
 * Bluebird AKA (application with alt precedence)
 * Combinator     : S(KS)K
 * SK Combinator  : ((S(KS))K)
 * Lambda Calculus: λfgx.f(gx) instead of λfgx.fgx ≡ λfgx.(fg)x
 * Haskell        : ($) :: (a -> b -> c) -> (a -> c -> b)
 * Imperative     : f(g)(y) -> f((g)(x))
 */
$B = fn($f) => fn($x) => fn($y) => $f($y)($x);


/**
 * Cardinal AKA flip
 * Combinator     :
 * SK Combinator  :
 * Lambda Calculus: λfxy.fyx)
 * Haskell        : flip :: (a -> b) -> (b -> a)
 * Imperative     : f(x)(y) -> f(y)(x)
 */
$C   = fn($a) => fn($b) => fn($c) => $a($c)($b);


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
