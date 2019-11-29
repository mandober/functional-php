<?php declare(strict_types=1);

// ================================================================= AUTOLOADER
require_once dirname(__DIR__) . "/vendor/autoload.php";

// ===================================================================== IMPORT
use PHPUnit\Framework\TestCase;

// ====================================================================== TESTS
final class CurryTest extends TestCase
{
    public function test_curry()
    {
        $s = fn($a, $b, $c, $d) => $a + $b + $c + $d;

        $this->assertEquals(
            10,  // expected
            \mandober\fu\curry($s)(1)(2)(3)(4)
        );
    }

    public function test_curry_accept_args_one_by_one()
    {
        $s = fn($a, $b, $c) => $a + $b + $c;

        $this->assertEquals(
            65,  // expected
            \mandober\fu\curry($s,4,5)(10,8)(25)(30,6,8,9)
        );
    }
}



/*
$this->

assertTrue
assertEquals(expected, actual)
assertSame(expected, actual)
assertInstanceOf
expectException(InvalidArgumentException::class);
*/
