<?php

namespace Tests;

use Last1971\SmartCommand\CommandAdapterFabric;
use Last1971\SmartCommand\UObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class CommandAdapterFabricTest extends TestCase
{
    /**
     * @return void
     * @throws ReflectionException
     */
    public function testOk(): void
    {
        $uObject = new UObject(['someValue' => 2.2]);
        /** @var TestInterface $adapter */
        $adapter = CommandAdapterFabric::create(TestInterface::class, $uObject);
        $this->assertEquals(2.2, $adapter->getSomeValue());
        $adapter->setSomeValue(1.1);
        $this->assertEquals(1.1, $adapter->getSomeValue());
    }
}
