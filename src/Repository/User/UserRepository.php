<?php

namespace App\Repository\User;

use App\Entity\User;
use App\Repository\AbstractRepository;
use PDO;

class UserRepository extends AbstractRepository
{

    public function findAll(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM `users`");

        return $stmt->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public function insert(User $user): void
    {
        $stmt = $this->db->prepare("INSERT INTO `users` () VALUES (:id, :role, :firstName, :userName)");

        $stmt->bindParam(':id', $user->getId());
    }
}