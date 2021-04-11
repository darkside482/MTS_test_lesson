<?php

namespace Repository;

use PDO;
use Repository\AbstractRepository;

class MessageRepository extends AbstractRepository
{
    public function count(array $where): int
    {
        $sql = "SELECT COUNT(*) FROM messages WHERE user_id = :user_id AND date > :from and date < :to";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('user_id', $where['user_id']);

        if ($where['from'] === null) {
            $where['from'] = new \DateTime('2000-01-01');
        }

        $from = $where['from']->format('c');

        $stmt->bindParam(':from', $from);

        if ($where['to'] === null) {
            $where['to'] = new \DateTime('now');
        }

        $to = $where['to']->format('c');

        $stmt->bindParam(':to', $to);

        $stmt->execute();
        return $stmt->fetchColumn();
    }

    /**
     * @param string $type
     * @return array
     */
    public function groupUsersByMessages(string $type)
    {
        $sql = "SELECT user_id FROM messages ";

        switch ($type) {
            case 'silent':
                $sql .= "GROUP BY user_id ";
                $sql .= "HAVING COUNT(*) < 2 ";
                break;
            case 'speaker':
                $sql .= "GROUP BY user_id ";
                $sql .= "HAVING COUNT(*) >= 2 ";
                break;
            case 'memeLover':
                $sql .= "WHERE text SIMILAR TO '([^[:alnum:]]*)'";
                $sql .= "GROUP BY user_id ";
                break;
        }

        return  $this->db->query($sql)->fetchAll(PDO::FETCH_COLUMN);
    }
}