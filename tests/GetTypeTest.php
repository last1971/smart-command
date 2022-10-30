<?php

namespace Tests;

use Last1971\SmartCommand\CreatingMethods\GetType;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use ReflectionNamedType;

class GetTypeTest extends TestCase
{
    /**
     * @var GetType
     */
    private GetType $getType;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->getType = new GetType();
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->getType);
    }

    /**
     * @return void
     */
    public function testNull(): void
    {
        $this->assertEquals('', $this->getType->getType(null));
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testType(): void
    {
        $type = $this->createMock(ReflectionNamedType::class);
        $type->method('allowsNull')->willReturn(false);
        $type->method('getName')->willReturn('string');
        $this->assertEquals('string', $this->getType->getType($type));
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testNullType(): void
    {
        $type = $this->createMock(ReflectionNamedType::class);
        $type->method('allowsNull')->willReturn(true);
        $type->method('getName')->willReturn('string');
        $this->assertEquals('?string', $this->getType->getType($type));
    }
}