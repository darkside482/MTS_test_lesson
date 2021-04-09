<?php

namespace App\DTO;

/**
 * Class UserMessageDTO
 * @package App\Dto
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