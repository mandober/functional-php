<?php declare(strict_types=1);


// ================================================================= AUTOLOADER
require_once '../vendor/autoload.php';


// ============================================================ IMPORTS ALIASED
use function mandober\fprelude\{println as p, dump as d};

// =========================================================== IMPORT FUNCTIONS
use function mandober\fprelude\finkel;



// ==================================================================== SANDBOX
p('orange', 12, true, 3.44);
d('orange', [12], true, 3.44, [ 'r' => 'red', 'b' => 'blue']);


# finkeling
function add($a, $b, $c, $d) {
    return $a + $b + $c + $d;
}

echo finkel('add',1,2,3,4), PHP_EOL;
echo finkel('add',1,2)(3)(4), PHP_EOL;
echo finkel('add')(1,2)()()(3)()(4), PHP_EOL;
echo finkel('add',1)(2)(3,4), PHP_EOL;
echo finkel('add')(1)(2)(3)(4), PHP_EOL;
