<?php

namespace DB;

use PDO;

final class DB {

    private const DSN = 'pgsql:host=postgres_mts;port=5432;dbname=MTS;user=MTS;password=MTS';

    protected static $pdo;

    public static function getInstance(): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        self::$pdo = new PDO(self::DSN);

        return self::$pdo;
    }

    private function __construct(){}

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    private function __clone(){}
}
