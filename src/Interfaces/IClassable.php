<?php

namespace Last1971\SmartCommand\Interfaces;

use ReflectionClass;
use ReflectionMethod;

interface IClassable
{
    /**
     * @param ReflectionClass $class
     * @return string
     */
    public function getClassName(ReflectionClass $class):string;

    /**
     * @return string
     */
    public function createConstructor(): string;

    /**
     * @param ReflectionMethod $method
     * @return string
     */
    public function createMethod(ReflectionMethod $method): string;
}