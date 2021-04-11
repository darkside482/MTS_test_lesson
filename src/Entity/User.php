<?php

namespace Entity;

/**
 * Class User
 * @package Entity
 */
class User implements EntityInterface
{
    private const TABLE_NAME = 'users';

    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';

    private string $id;

    private string $role;

    private string $firstName;

    private string $userName;

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
          'role' => $this->role,
          'first_name' => $this->firstName,
          'user_name' => $this->userName
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
     * @return User
     */
    public function setId(string $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole(string $role): User
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return User
     */
    public function setUserName(string $userName): User
    {
        $this->userName = $userName;
        return $this;
    }
}