<?php

namespace Controller;

use App\Handler\HandlerInterface;

abstract class AbstractController
{
    private const METHOD_NAME = '__invoke';

    /**
     * @param $message
     * @throws \ReflectionException
     */
    protected static function dispatch($message)
    {
        $classes = get_declared_classes();

        foreach ($classes as $class) {

            $reflection = new \ReflectionClass($class);

            if ($reflection->implementsInterface(HandlerInterface::class)) {
                $methodReflection = new \ReflectionMethod($class, self::METHOD_NAME);
                $params = $methodReflection->getParameters();

                foreach ($params as $param) {
                    if ($param->getClass() === get_class($message)) {
                        $handler = new $class();
                        $handler($message);
                        return;
                    }
                }
            }
        }
    }
}