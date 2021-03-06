<?php

namespace Entity;

interface EntityInterface
{
    /**
     * @return string
     */
    public function getTableName(): string;

    /**
     * @return array
     */
    public function getColumns(): array;
}