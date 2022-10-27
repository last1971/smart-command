<?php

namespace Tests;

use Last1971\SmartCommand\CreatingMethods\MethodVoid;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use ReflectionNamedType;

class MethodVoidTest extends TestCase
{
    public function testOk(): void
    {
        $method = $this->createMock(ReflectionMethod::class);
        $method->method('getName')->willReturn('doSomething');
        $type = $this->createMock(ReflectionNamedType::class);
        $type->method('getName')->willReturn('void');
        $method->method('getReturnType')->willReturn($type);
        $methodVoid = new MethodVoid();
        $response = $methodVoid->createMethod($method);
        $this->assertEquals(
            'public function doSomething(): void { $this->uObject->doSomething(); }',
            $response,
        );
    }
}