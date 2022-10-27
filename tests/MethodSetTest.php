<?php

namespace Tests;

use Last1971\SmartCommand\CreatingMethods\MethodSet;
use Last1971\SmartCommand\Interfaces\IUObject;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use ReflectionParameter;

class MethodSetTest extends TestCase
{
    public function testOk(): void
    {
        $method = $this->createMock(ReflectionMethod::class);
        $parameter = $this->createMock(ReflectionParameter::class);
        $parameter->method('getType')->willReturn(null);
        $parameter->method('getName')->willReturn('someString');
        $method->method('getName')->willReturn('setSomeString');
        $method->method('getParameters')->willReturn([$parameter]);
        $methodSet = new MethodSet();
        $response = $methodSet->createMethod($method);
        $this->assertEquals(
            'public function setSomeString( $someString): void { $this->uObject->set(\'someString\', $someString); }',
            $response,
        );
    }
}