<?php
declare(strict_types=1);
namespace Lamansky\SecureShuffle\Test;
use PHPUnit\Framework\TestCase;
use function Lamansky\SecureShuffle\shuffle;
use function Lamansky\SecureShuffle\shuffle_assoc;
use function Lamansky\SecureShuffle\shuffled;
use function Lamansky\SecureShuffle\shuffled_assoc;

final class FunctionsTest extends TestCase {

    public function testShuffle () : void {
        $original = [1, 2, 3, 4, 5];
        $arr = array_values($original);
        $this->assertNull(shuffle($arr));
        $this->assertNotEquals($original, $arr);
        $this->assertEqualsCanonicalizing($original, $arr);
    }

    public function testShuffled () : void {
        $original = [1, 2, 3, 4, 5];
        $arr = shuffled($original);
        $this->assertNotEquals($original, $arr);
        $this->assertEqualsCanonicalizing($original, $arr);
    }

    public function testShuffleAssoc () : void {
        $original = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
        $arr = array_merge([], $original);
        $this->assertNull(shuffle_assoc($arr));
        $this->assertNotEquals(array_keys($original), array_keys($arr));
        $this->assertEqualsCanonicalizing($original, $arr);
        $this->assertEquals($arr['a'], 1);
        $this->assertEquals($arr['b'], 2);
        $this->assertEquals($arr['c'], 3);
        $this->assertEquals($arr['d'], 4);
        $this->assertEquals($arr['e'], 5);
    }

    public function testShuffledAssoc () : void {
        $original = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
        $arr = shuffled_assoc($original);
        $this->assertNotEquals(array_keys($original), array_keys($arr));
        $this->assertEqualsCanonicalizing($original, $arr);
        $this->assertEquals($arr['a'], 1);
        $this->assertEquals($arr['b'], 2);
        $this->assertEquals($arr['c'], 3);
        $this->assertEquals($arr['d'], 4);
        $this->assertEquals($arr['e'], 5);
    }
}
