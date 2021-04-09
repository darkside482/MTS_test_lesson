<?php

namespace App\DB;

use PDO;

final class DB {

    private static PDO $pdo;

    public static function getInstance(): PDO
    {
        if (self::$pdo) {
            return self::$pdo;
        }

        $dsn = getenv('DATABASE_URL');

        self::$pdo = new PDO($dsn);

        return self::$pdo;
    }

    private function __construct(){}

    private function __sleep(){}

    private function __wakeup(){}

    private function __clone(){}
}
