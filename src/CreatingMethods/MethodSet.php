<?php

namespace Last1971\SmartCommand\CreatingMethods;

use Last1971\SmartCommand\Interfaces\IMethodable;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionParameter;

class MethodSet implements IMethodable
{

    /**
     * @param ReflectionMethod $method
     * @return string
     */
    public function createMethod(ReflectionMethod $method): string
    {
        $methodName = $method->getName();
        $name = lcfirst(substr($methodName, 3));
        $parameter = $method->getParameters()[0];
        $response = "public function $methodName(";
        $response .= $this->createParameter($parameter);
        $response .= "): void { ";
        $parameterName = $parameter->getName();
        $response .= "\$this->uObject->set('$name', \$$parameterName); }";
        return $response;
    }

    /**
     * @param ReflectionParameter $parameter
     * @return string
     */
    private function createParameter(ReflectionParameter $parameter): string
    {
        $type = $parameter->getType();
        $returnTypeName = $type instanceof ReflectionNamedType ? $type->getName() : '';
        $name = $parameter->getName();
        $response = "$returnTypeName $$name";
        if ($parameter->isDefaultValueAvailable()) {
            $defaultValue = $parameter->getDefaultValue();
            $response .= "=" . $defaultValue;
        }
        return $response;
    }
}