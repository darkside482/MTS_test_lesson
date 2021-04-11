<?php

namespace DTO;

/**
 * Class UserMessageDTO
 * @package Dto
 */
class UserMessageDTO
{

    private string $uuid;

    private string $text;

    public function __construct(array $userMessage)
    {
        $this->uuid = $userMessage['uuid'];
        $this->text = $userMessage['text'];
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }
}