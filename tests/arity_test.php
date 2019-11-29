<?php declare(strict_types=1);

// ================================================================= AUTOLOADER
require_once dirname(__DIR__) . "/vendor/autoload.php";

// ===================================================================== IMPORT
use PHPUnit\Framework\TestCase;

// ====================================================================== TESTS
final class ArityTest extends TestCase
{
    public function test_arity_named_function()
    {
        // named function; must be given by full NS
        function nf($a, $b) { echo 'nf binary', PHP_EOL;}

        $this->assertEquals(
            2,                          // expected
            \mandober\fu\arity('nf')    // actual
        );
    }

    public function test_arity_anon_function()
    {
        $s = fn($a, $b, $c, $d) => $a + $b + $c + $d;

        $this->assertEquals(
            4,                          // expected
            \mandober\fu\arity($s)      // actual
        );
    }

    public function test_arity_class_invoke()
    {
        $klass = new class {
            public function __invoke($v) {
                return $v;
            }
        };

        $this->assertEquals(
            1,
            \mandober\fu\arity([$klass, '__invoke'])      // actual
        );
    }

    public function test_arity_class_call_static()
    {
        $klass = new class {
            public static function __callStatic($v, $x) {
                return $v;
            }
        };

        $this->assertEquals(
            2,
            \mandober\fu\arity([$klass, '__callStatic'])      // actual
        );
    }

    public function test_arity_static_method()
    {
        $klass = new class {
            public static function ght($a,$b,$c) {
                return $a;
            }
        };

        $this->assertEquals(
            3,
            \mandober\fu\arity([$klass, 'ght'])      // actual
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
