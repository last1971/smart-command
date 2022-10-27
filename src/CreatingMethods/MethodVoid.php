<?php

namespace Last1971\SmartCommand\CreatingMethods;

use Last1971\SmartCommand\Interfaces\IMethodable;
use ReflectionMethod;

class MethodVoid implements IMethodable
{

    /**
     * @param ReflectionMethod $method
     * @param array $args
     * @return string
     */
    public function createMethod(ReflectionMethod $method, ...$args): string
    {
        $methodName = $method->getName();
        $response = "public function $methodName(): void ";
        $response .= "{ \$this->uObject->$methodName(); }";
        return $response;
    }
}