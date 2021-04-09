<?php

namespace App\Repository\Message;

use App\Repository\AbstractRepository;

class MessageRepository extends AbstractRepository
{
    public function count(array $where): int
    {
        $sql = "SELECT COUNT(*) FROM messages ";

        if (!empty($where)) {
            $sql .= " AND 1=1";
            foreach (array_keys($where) as $field) {
                $sql .= "AND $field = ?";
            }
        }

        $stmt = $this->db->prepare($sql);

        $param = 1;
        foreach (array_values($where) as $value) {
            $stmt->bindParam($param, $value);
            $param++;
        }

        $stmt->execute();
        return $stmt->fetchColumn();
    }
}