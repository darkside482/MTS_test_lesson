<?php

namespace App\DTO;

/**
 * Class UserDTO
 * @package App\Dto
 */
class UserDTO
{
    private string $uuid;

    private string $role;

    private string $firstName;

    private string $userName;

    public function __construct(array $user)
    {
        $this->uuid = $user['uuid'];
        $this->role = $user['role'];
        $this->firstName = $user['firstName'];
        $this->userName = $user['userName'];
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }
}