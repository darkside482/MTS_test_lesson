<?php

namespace App\DTO;

class GroupUsersByMessagesDTO
{
    private array $result = [];

    public function setResult(array $result): self
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
    }
}
