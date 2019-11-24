<?php declare(strict_types=1);


// ================================================================= AUTOLOADER
require_once '../vendor/autoload.php';


// ==================================================================== IMPORTS
use function mandober\fprelude\utils\{println as p, dump as d};


// ==================================================================== SANDBOX
p('orange', 12, true, 3.44);
d('orange', [12], true, 3.44, [ 'r' => 'red', 'b' => 'blue']);

