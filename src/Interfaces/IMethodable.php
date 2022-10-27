<?php

namespace Last1971\SmartCommand\Interfaces;

use ReflectionMethod;

interface IMethodable
{
    /**
     * @param ReflectionMethod $method
     * @return string
     */
    public function createMethod(ReflectionMethod $method): string;
}