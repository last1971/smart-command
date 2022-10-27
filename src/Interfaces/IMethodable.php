<?php

namespace Last1971\SmartCommand\Interfaces;

use ReflectionMethod;

interface IMethodable
{
    /**
     * @param ReflectionMethod $method
     * @param array $args
     * @return string
     */
    public function createMethod(ReflectionMethod $method, ...$args): string;
}