<?php declare(strict_types=1);

namespace mandober\fu;

function println(...$args)
{
    $a = implode(', ', $args);
    echo $a, PHP_EOL;
}


function dump(...$xs)
{
    foreach ($xs as $x) {
        if (is_scalar($x)) {
            echo $x, PHP_EOL;
        } else {
            var_dump($x);
        }
    }
}
