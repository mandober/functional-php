<?php declare(strict_types=1);

// ================================================================= AUTOLOADER
require_once dirname(__DIR__) . "/vendor/autoload.php";

// ============================================================ IMPORTS ALIASED
use function mandober\fu\{finkel, dump as d};


// ==================================================================== SANDBOX
d('orange', [12], true, 3.44, [ 'r' => 'red', 'b' => 'blue']);


# finkeling
function add($a, $b, $c, $d)
{
    return $a + $b + $c + $d;
}

echo finkel('add',1,2,3,4), PHP_EOL;
echo finkel('add',1,2)(3)(4), PHP_EOL;
echo finkel('add')(1,2)()()(3)()(4), PHP_EOL;
echo finkel('add',1)(2)(3,4), PHP_EOL;
echo finkel('add')(1)(2)(3)(4), PHP_EOL;



/*
$d1 = \mandober\fu\anonimize(__NAMESPACE__ . '\dd');
$d1([1,[2],3]);

$d2 = anonimize(__NAMESPACE__ . '\dd');
$d2([1,[2],3]);

const dd = "dd";
dd([3,[5],3]);

dump([3,[5],3]);
\mandober\fu\dump([3,[5],3]);

$d3 = anonimize(__NAMESPACE__ . '\dump');
$d3([3,[5],3]);

$d4 = anonimize('\mandober\fu\dump');
$d4([3,[5],3]);

$d5 = anonimize('mandober\fu\dump');
$d5([3,[5],3]);

// export/import: const dump = '\mandober\fu\dump';
dump([3,[5],3]);

$d6 = anonimize(dump);
$d6([3,[5],3]);

*/
