<?php declare(strict_types=1);

// ================================================================= AUTOLOADER
require_once dirname(__DIR__) . "/vendor/autoload.php";

// ===================================================================== IMPORT
use PHPUnit\Framework\TestCase;

// ====================================================================== TESTS
final class ComposeTest extends TestCase
{
    public function test_compose()
    {
        $f = fn($a) => $a + 5;
        $g = fn($a) => $a / 2;
        $h = fn($a) => $a * 3;
        // h(g(f(x)))
        $c = \mandober\fu\compose($h,$g,$f);

        $this->assertEquals(
            // expected
            30,
            // actual
            $c(15)
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
