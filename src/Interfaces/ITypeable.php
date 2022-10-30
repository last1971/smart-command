<?php

namespace Last1971\SmartCommand\Interfaces;

use ReflectionType;

interface ITypeable
{
    /**
     * @param ReflectionType|null $type
     * @return string
     */
    public function getType(?ReflectionType $type): string;
}