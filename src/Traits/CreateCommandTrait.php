<?php

namespace Last1971\SmartCommand\Traits;

use Last1971\SmartCommand\CommandAdapterFabric;
use Last1971\SmartCommand\Interfaces\IUObject;
use ReflectionClass;
use ReflectionException;
use ReflectionNamedType;
use ReflectionProperty;

trait CreateCommandTrait
{
    /**
     * @param IUObject $object
     * @return self
     * @throws ReflectionException
     */
    public static function create(IUObject $object): self
    {
        $reflect = new ReflectionClass(self::class);
        $params = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
        $i = 0;
        do {
            /** @var ?ReflectionNamedType $param */
            $param = $params[$i++]->getType();
            $interface = $param->getName();
        } while (!interface_exists($interface));
        return new self($interface === IUObject::class ? $object : CommandAdapterFabric::create($interface, $object));
    }
}