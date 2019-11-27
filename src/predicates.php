<?php declare(strict_types=1);

namespace mandober\fu;

function odd(float $n) : bool
{
    return $n & 1;
}

function even(float $n) : bool
{
    return !($n & 1);
}
