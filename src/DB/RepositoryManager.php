<?php

namespace App\DB;

use App\Repository\AbstractRepository;
use App\Repository\DefaultRepository;

class RepositoryManager
{

    private array $instances = [];

    /**
     * @param string $className
     * @return AbstractRepository
     */
    public function getRepository(string $className): AbstractRepository
    {
        $repositoryName = ucfirst($className) . 'Repository';

        if (!array_key_exists($repositoryName, $this->instances)) {

            if (class_exists($repositoryName)) {
                $repository = new $repositoryName();
            } else {
                $repository = new DefaultRepository();
            }

            $this->instances[$repositoryName] = $repository;

            return $repository;
        } else {
            return $this->instances[$repositoryName];
        }
    }
}
