<?php declare(strict_types=1);

namespace mandober\fu;


/**
 * Pack an indexed sparse array.
 */
function pack(array $xs) : array
{
    $acc = [];
    foreach ($xs as $x) {
        $acc[] = $x;
    }
    return $acc;
}


/*
print_r(
    pack([
        2 => 0,
        4 => 1,
        7 => 2,
    ])
);
*/
