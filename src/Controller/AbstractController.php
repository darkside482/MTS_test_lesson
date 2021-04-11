<?php

namespace Controller;

use Handler\SaveMessagesHandler;

abstract class AbstractController
{
    private const METHOD_NAME = '__invoke';

    /**
     * @param $message
     * @return mixed
     * @throws \Exception
     */
    protected static function dispatch($message)
    {

        $className = str_replace('DTO', 'Handler', get_class($message));
        try {
            $class = new $className;
        } catch (\Throwable $e) {
            throw new \Exception('Handler not found');
        }

        return $class($message);
    }
}