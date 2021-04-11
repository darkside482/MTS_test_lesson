<?php

namespace DTO;

class GroupUsersByMessagesDTO
{
    private array $result = [];

    private string $group;

    public function __construct(string $group)
    {
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

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
