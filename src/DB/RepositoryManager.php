<?php

namespace DB;

use Repository\AbstractRepository;
use Repository\DefaultRepository;

class RepositoryManager
{

    private array $instances = [];

    /**
     * @param string $className
     * @return AbstractRepository
     */
    public function getRepository(string $className): AbstractRepository
    {
        $repositoryName = str_replace('Entity', 'Repository', ucfirst($className)) . 'Repository';

        if (!array_key_exists($repositoryName, $this->instances)) {

            try {
                $repository = new $repositoryName();
            } catch (\Throwable $e) {
                $repository = new DefaultRepository();
            }

            $this->instances[$repositoryName] = $repository;

            return $repository;
        } else {
            return $this->instances[$repositoryName];
        }
    }
}
