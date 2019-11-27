<?php declare(strict_types=1);

namespace mandober\fu;

function atom(...$atoms)
{
    \array_walk(
        $atoms,
        function ($atom) {
            if (\defined($atom)) {
                if ($atom !== \constant($atom)) {
                    raise("The atom is already defined with a different value: " . $atom);
                }
            } else {
                \define($atom, $atom);
            }
        }
    );
}
