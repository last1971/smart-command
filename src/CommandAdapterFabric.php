<?php

namespace Last1971\SmartCommand;

use Exception;
use Last1971\SmartCommand\Interfaces\IClassable;
use Last1971\SmartCommand\Interfaces\IUObject;
use ReflectionClass;
use ReflectionException;

class CommandAdapterFabric
{
    /**
     * @param string $interface
     * @param IUObject $object
     * @param IClassable|null $classable
     * @return mixed
     * @throws ReflectionException
     * @throws Exception
     */
    public static function create(string $interface, IUObject $object, IClassable $classable = null): mixed
    {
        $classable = $classable ?? new DynamicAdapterClass();
        $reflectionClass = new ReflectionClass($interface);
        $adapterName = $classable->getClassName($reflectionClass);
        if (!class_exists($adapterName)) {
            $eval = "class  $adapterName implements $interface { ";
            $eval .= $classable->createConstructor();
            foreach ($reflectionClass->getMethods() as $method) {
                $eval .= $classable->createMethod($method);
            }
            $eval .= "}; ";
            eval($eval);
        }
        return new $adapterName($object);
    }
}