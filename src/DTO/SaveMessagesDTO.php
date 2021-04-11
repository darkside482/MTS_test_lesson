<?php

namespace DTO;

class SaveMessagesDTO
{
    /**
     * @var MessageDto[]
     */
    private array $messages = [];

    private array $savedMessages = [];

    public function __construct(array $messages)
    {
        foreach ($messages as $message) {
            $this->messages[] = new MessageDTO($message);
        }
    }

    /**
     * @return array|MessageDTO[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param array $savedMessaged
     * @return $this
     */
    public function setSavedMessages(array $savedMessaged): self
    {
        $this->savedMessages = $savedMessaged;

        return $this;
    }

    /**
     * @return array
     */
    public function getSavedMessages(): array
    {
        return $this->savedMessages;
    }
}