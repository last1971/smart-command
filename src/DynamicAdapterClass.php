<?php

namespace Last1971\SmartCommand;

use Last1971\SmartCommand\CreatingMethods\MethodGet;
use Last1971\SmartCommand\CreatingMethods\MethodSet;
use Last1971\SmartCommand\CreatingMethods\MethodVoid;
use Last1971\SmartCommand\Interfaces\IClassable;
use Last1971\SmartCommand\Interfaces\IUObject;
use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;

class DynamicAdapterClass implements IClassable
{
    /**
     * @var array
     */
    private array $methods;

    public function __construct()
    {
        $this->methods = [
            'void0' => new MethodVoid(),
            'void1' => new MethodSet(),
        ];
    }

    /**
     * @param ReflectionClass $class
     * @return string
     */
    public function getClassName(ReflectionClass $class): string
    {
        return $class->getShortName() . 'Adapter';
    }

    /**
     * @return string
     */
    public function createConstructor(): string
    {
        $iUObject = IUObject::class;
        $response = "private $iUObject \$uObject; ";
        $response .= "public function __construct($iUObject \$uObject) ";
        $response .= "{ \$this->uObject = \$uObject; }";
        return $response;
    }

    /**
     * @param ReflectionMethod $method
     * @return string
     */
    public function createMethod(ReflectionMethod $method): string
    {
        $parameters = $method->getParameters();
        $returnType = $method->getReturnType();
        $returnTypeName = $returnType instanceof ReflectionNamedType ? $returnType->getName() : '';
        $methodable = $this->methods[$returnTypeName . count($parameters)] ?? new MethodGet();
        return $methodable->createMethod($method);
    }
}