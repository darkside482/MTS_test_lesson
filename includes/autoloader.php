<?php

spl_autoload_register(function ($class_name) {
    $parts = explode('\\', $class_name);
    require '../src/' . implode('/', $parts) . '.php';
});
