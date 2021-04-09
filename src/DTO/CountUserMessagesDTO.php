<?php

namespace App\DTO;

class CountUserMessagesDTO
{
    private int $userId;

    private ?int $from;

    private ?int $to;

    private array $messagesCount;

    public function __construct(string $userId, ?int $from, ?int $to)
    {
        $this->userId = $userId;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return int|string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return int|null
     */
    public function getFrom(): ?int
    {
        return $this->from;
    }

    /**
     * @return int|null
     */
    public function getTo(): ?int
    {
        return $this->to;
    }

    /**
     * @return array
     */
    public function getMessagesCount(): array
    {
        return $this->messagesCount;
    }

    /**
     * @param int $messagesCount
     */
    public function setMessagesCount(int $messagesCount): void
    {
        $this->messagesCount['messagesCount'] = $messagesCount;
    }
}
