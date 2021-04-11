<?php

namespace DTO;

use Cassandra\Date;

class CountUserMessagesDTO
{
    private string $userId;

    private ?\DateTime $from = null;

    private ?\DateTime $to = null;

    private int $messagesCount;

    public function __construct(string $userId, ?int $from, ?int $to)
    {
        $this->userId = $userId;
        if ($from !== null) {
            $this->from = new \DateTime('@' . $from);
        }

        if ($to !== null) {
            $this->to = new \DateTime('@' . $to);
        }
    }

    /**
     * @return int|string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return \DateTime|null
     */
    public function getFrom(): ?\DateTime
    {
        return $this->from;
    }

    /**
     * @return \DateTime|null
     */
    public function getTo(): ?\DateTime
    {
        return $this->to;
    }

    /**
     * @return int
     */
    public function getMessagesCount(): int
    {
        return $this->messagesCount;
    }

    /**
     * @param int $messagesCount
     */
    public function setMessagesCount(int $messagesCount): void
    {
        $this->messagesCount = $messagesCount;
    }
}
