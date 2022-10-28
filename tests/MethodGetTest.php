<?php

namespace Tests;

use Last1971\SmartCommand\CreatingMethods\MethodGet;
use Last1971\SmartCommand\Interfaces\IMethodable;
use Last1971\SmartCommand\Interfaces\IUObject;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use ReflectionNamedType;

class MethodGetTest extends TestCase
{
    /**
     * @var IMethodable
     */
    private IMethodable $methodGet;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->methodGet = new MethodGet();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->methodGet);
    }

    public function testCreateSimple(): void
    {
        $method = $this->createMock(ReflectionMethod::class);
        $type = $this->createMock(ReflectionNamedType::class);
        $type->method('getName')->willReturn('string');
        $method->method('getName')->willReturn('getThis');
        $method->method('getReturnType')->willReturn($type);
        $result = $this->methodGet->createMethod($method);
        $this->assertEquals(
            "public function getThis(): string{ return \$this->uObject->get('this'); }",
            $result
        );
    }

    public function testCreateThis(): void
    {
        $method = $this->createMock(ReflectionMethod::class);
        $type = $this->createMock(ReflectionNamedType::class);
        $type->method('getName')->willReturn(IUObject::class);
        $method->method('getName')->willReturn('getThis');
        $method->method('getReturnType')->willReturn($type);
        $result = $this->methodGet->createMethod($method);
        $this->assertEquals(
            "public function getThis(): Last1971\SmartCommand\Interfaces\IUObject{ return \$this->uObject; }",
            $result
        );
    }
}