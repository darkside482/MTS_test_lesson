<?php

namespace Entity;

/**
 * Class Message
 * @package Entity
 */
class Message implements EntityInterface
{
    private const TABLE_NAME = 'messages';

    private string $id;

    private string $userId;

    private string $text;

    private string $date;

    /**
     * @inheritDoc
     */
    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }

    public function __set($name, $value)
    {
        $this->{lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $name))))} = $value;

        //Вы спросите меня, что это за дичь? А я отвечу вам, что это нужно для маппинга колонок из базы из snake_case'a в camelCase
        // Да, да. Мне стыдно xD
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
            'date' => (new \DateTime('@' . $this->date))->format('c')
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
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return Message
     */
    public function setDate(string $date): Message
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param string $userId
     * @return Message
     */
    public function setUserId(string $userId): Message
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }
}