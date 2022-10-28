<?php

namespace Tests;

use Last1971\SmartCommand\UObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class CreateCommandTraitTest extends TestCase
{
    /**
     * @return void
     * @throws ReflectionException
     */
    public function testOk(): void
    {
        $test = new UObject(['someValue' => 2.2]);
        $command = TestCommand::create($test);
        $command->execute();
        $this->assertEquals(1.1, $test->get('someValue'));
    }
}