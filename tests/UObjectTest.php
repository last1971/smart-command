<?php

namespace Tests;

use Last1971\SmartCommand\UObject;
use PHPUnit\Framework\TestCase;

class UObjectTest extends TestCase
{
    /**
     * @return void
     */
    public function testOk(): void
    {
        $test = new UObject(['test' => 'test']);
        $this->assertEquals('test', $test->get('test'));
        $test->set('test', 1.0);
        $this->assertEquals(1.0, $test->get('test'));
        $this->assertNull($test->get('tset'));
        $this->assertEquals(md5(serialize(['test' => 1.0])), $test->hash());
    }
}