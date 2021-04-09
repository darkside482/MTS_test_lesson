<?php

namespace App\DTO;

class MessageDTO
{
    private int $date;

    private UserDTO $user;

    private UserMessageDTO $userMessageDto;

    public function __construct(array $message)
    {
        $this->date = $message['date'];
        $this->user = new UserDTO($message['from']);
        $this->userMessageDto = new UserMessageDTO($message['message']);
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @return UserDTO
     */
    public function getUser(): UserDTO
    {
        return $this->user;
    }

    /**
     * @return UserMessageDTO
     */
    public function getUserMessageDto(): UserMessageDTO
    {
        return $this->userMessageDto;
    }
}