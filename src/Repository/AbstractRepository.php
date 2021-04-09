<?php

namespace App\Repository;

use App\DB\DB;
use App\Entity\EntityInterface;
use PDO;

abstract class AbstractRepository
{

    protected PDO $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     * @inheritDoc
     */
    public function findAll(EntityInterface $entity): array
    {
        $stmt = $this->db->prepare("SELECT * FROM " . $entity->getTableName());
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS,  get_class($entity));
    }

    /**
     * @inheritDoc
     */
    public function insert(EntityInterface $entity): void
    {
        $columnsValues = $entity->getColumns();

        $sql = 'INSERT INTO ' . $entity->getTableName() .
            ' (' . array_keys($columnsValues) . ') VALUES ';

        $stmtValues = [];

        array_walk($columnsValues, function ($v, $k) use ($stmtValues) {
            $stmtValues[':' . $k] = $v;
        });

        $stmt = $this->db->prepare($sql . '(' . implode(', ', array_keys($stmtValues)) . ')');

        foreach ($stmtValues as $column => $value) {
            $stmt->bindParam($column, $value);
        }

        $stmt->execute();
    }
}