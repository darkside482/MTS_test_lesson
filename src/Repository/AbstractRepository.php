<?php

namespace Repository;

use DB\DB;
use Entity\EntityInterface;
use PDO;

abstract class AbstractRepository
{

    protected PDO $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     * @param EntityInterface $entity
     * @return array
     */
    public function findAll(EntityInterface $entity): array
    {
        $stmt = $this->db->prepare("SELECT * FROM " . $entity->getTableName());
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS,  get_class($entity));
    }

    /**
     * @param EntityInterface $entity
     */
    public function insert(EntityInterface $entity): void
    {
        $columnsValues = $entity->getColumns();

        $sql = 'INSERT INTO ' . $entity->getTableName() .
            ' (' . implode(', ', array_keys($columnsValues)) . ') VALUES ';

        $stmtValues = [];

        array_walk($columnsValues, function ($v, $k) use (&$stmtValues) {
            $stmtValues[':' . $k] = $v;
        });

        $sql .= '(' . implode(', ', array_keys($stmtValues)) . ')';

        $stmt = $this->db->prepare($sql);

        foreach ($stmtValues as $column => &$value) {
            $stmt->bindParam($column, $value);
        }

        $stmt->execute();
    }
}