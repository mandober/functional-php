<?php declare(strict_types=1);

namespace mandober\fu;

/**
 * Print scalars with echo, compound types with print_r.
 *
 * @param mixed ...$xs One or more arguments.
 */
function dump(...$xs) : void
{
    foreach ($xs as $x) {
        if (is_scalar($x)) {
            echo $x, PHP_EOL;
        } else {
            print_r($x);
        }
    }
}
