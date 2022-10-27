<?php

namespace Tests;

use Last1971\SmartCommand\DynamicAdapterClass;
use Last1971\SmartCommand\Interfaces\IUObject;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;

class DynamicAdapterClassTest extends TestCase
{
    /**
     * @var DynamicAdapterClass
     */
    private DynamicAdapterClass $adapter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->adapter = new DynamicAdapterClass();
        parent::setUp();
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->adapter);
        parent::tearDown();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testGetClassName(): void
    {
        $class = $this->createMock(ReflectionClass::class);
        $class->method('getShortName')->willReturn('MyClass');
        $this->assertEquals('MyClassAdapter', $this->adapter->getClassName($class));
    }

    /**
     * @return void
     */
    public function testCreateConstructor(): void
    {
        $this->assertStringContainsString(
            'private ' . IUObject::class . ' $uObject;', $this->adapter->createConstructor()
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testCreateMethod(): void
    {
        $type = $this->createMock(ReflectionNamedType::class);
        $type->method('getName')->willReturn('void');
        $method = $this->createMock(ReflectionMethod::class);
        $method->method('getParameters')->willReturn([]);
        $method->method('getReturnType')->willReturn($type);
        $method->method('getName')->willReturn('doSomething');
        $response = $this->adapter->createMethod($method);
        $this->assertEquals(
            'public function doSomething(): void { $this->uObject->doSomething(); }',
            $response,
        );
    }
}