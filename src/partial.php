<?php declare(strict_types=1);

namespace mandober\fp;


function partial(callable $f)
{
    $argc = \mandober\fu\arity($f);
    return function(...$xs) use ($f, $argc)
    {

    };
        // $argc === count($xs) + count($ys)
        //     ? $f(...$xs, ...$ys)
        //     : partial($f, ...$xs, ...$ys)
        // );
}


/*

$f = fn($a, $b, $c) => $a / ($b * $c)
pf1 = partial($f)

# supply just 1st and 3rd
pf2 = pf1(8,_,2)    # 8 / (_ * 2)

# supply the 2nd
pf3 = pf2(4)        # 8 / (4 * 2) = 1

pf = partial($f)(8,_,2)(4)

*/
