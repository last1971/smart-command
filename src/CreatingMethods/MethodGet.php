<?php

namespace Last1971\SmartCommand\CreatingMethods;

use Last1971\SmartCommand\Interfaces\IMethodable;
use Last1971\SmartCommand\Interfaces\IUObject;
use ReflectionMethod;
use ReflectionNamedType;

class MethodGet implements IMethodable
{

    /**
     * @param ReflectionMethod $method
     * @return string
     */
    public function createMethod(ReflectionMethod $method): string
    {
        $methodName = $method->getName();
        $name = lcfirst(substr($methodName, 3));
        $returnType = $method->getReturnType();
        $returnTypeName = $returnType instanceof ReflectionNamedType ? $returnType->getName() : '';
        $response = "public function $methodName(): $returnTypeName";
        $response .= $name === 'this' && $returnTypeName === IUObject::class
            ? "{ return \$this->uObject; }"
            : "{ return \$this->uObject->get('$name'); }";
        return $response;
    }
}