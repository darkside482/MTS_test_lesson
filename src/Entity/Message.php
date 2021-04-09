<?php

namespace App\Entity;

/**
 * Class Message
 * @package App\Entity
 */
class Message implements EntityInterface
{
    private const TABLE_NAME = 'messages';

    private string $id;

    private string $userId;

    private string $text;

    private int $date;

    /**
     * @inheritDoc
     */
    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }

    /**
     * @inheritDoc
     */
    public function getColumns(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->userId,
            'text' => $this->text,
            'date' => $this->date
        ];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Message
     */
    public function setId(string $id): Message
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Message
     */
    public function setText(string $text): Message
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return Message
     */
    public function setDate(int $date): Message
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }
}