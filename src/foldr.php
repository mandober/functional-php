<?php declare(strict_types=1);

namespace mandober\fu;

require("./finkel.php");

/**
 * foldr folds an array from right. Accumulator's initial value first.
 *
 * foldr :: b -> (a -> b -> b) -> [a] -> b
 *
 * @param mixed    $acc :: b              Initial value for accumulator.
 * @param callable $f   :: (b -> a -> b)  Reducer binary function.
 * @param array    $xs  :: [a]            Array to reduce.
 * @return mixed        b                 Reduced value (same type as acc).
 *
 */
const foldr = '\mandober\fu\foldr';

function foldr($acc, callable $f, array $xs)
{
    if (\count($xs) === 0) return $acc;
    $sx = \array_reverse($xs);
    $g = \mandober\fu\finkel($f);
    foreach($sx as $x) {
        $acc = $g($acc)($x);
    }
    return $acc;
}


/*

// pass binary to foldr
$r = foldr(0, fn($a, $b) => $a+$b, [1,2,3,4]);
echo $r;

// pass curryied "binary" to foldr
$s = foldr(0, fn($a) => fn($b) => $a+$b, [1,2,3,4]);
echo $s;

*/
