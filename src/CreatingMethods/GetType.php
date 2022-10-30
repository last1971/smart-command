<?php

namespace Last1971\SmartCommand\CreatingMethods;

use Last1971\SmartCommand\Interfaces\ITypeable;
use ReflectionNamedType;
use ReflectionType;

class GetType implements ITypeable
{

    /**
     * @param ReflectionType|null $type
     * @return string
     */
    public function getType(?ReflectionType $type): string
    {
        return $type instanceof ReflectionNamedType
            ? ($type->allowsNull() ? '?' : '') . $type->getName()
            : '';
    }
}