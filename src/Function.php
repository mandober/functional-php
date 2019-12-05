<?php declare(strict_types=1);

namespace mandober\fp;

/** id :: a -> a */
function id($a) { return $a; }

/** cnst :: a -> b -> a */
function cnst($a, $b) { return $a; }

/** apply :: (a -> b) -> a -> b */
function apply(callable $f, ...$xs) { return $f(...$xs); }



/*

id    :: a -> a
const :: a -> b -> a

flip  :: (a -> b -> c) -> b -> a -> c

(.)   :: (b -> c) -> (a -> b) -> a -> c

fix   :: (a -> a) -> a

on    :: (b -> b -> c) -> (a -> b) -> a -> a -> c

($)   :: (a -> b) -> a -> b
(&)   :: a -> (a -> b) -> b
*/
