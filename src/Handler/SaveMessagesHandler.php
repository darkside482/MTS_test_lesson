<?php

namespace App\Handler;

use App\DB\RepositoryManager;
use App\Dto\SaveMessagesDTO;
use App\Entity\Message;
use App\Entity\User;

/**
 * Class MessageHandler
 * @package App\Handler
 */
class SaveMessagesHandler implements HandlerInterface
{
    private RepositoryManager $rm;

    public function __construct()
    {
        $this->rm = new RepositoryManager();
    }

    public function __invoke(SaveMessagesDTO $messages): void
    {
        $savedMessages = [];

        foreach ($messages->getMessages() as $message) {
            if ($message->getUser()->getRole() === User::ROLE_ADMIN) {
                $userMessage = new Message();
                $userMessage
                    ->setDate($message->getDate())
                    ->setId($message->getUserMessageDto()->getUuid())
                    ->setText($message->getUserMessageDto()->getText());

                $this->rm->getRepository(Message::class)->insert($userMessage);
            }
        }

        $messages->setSavedMessages($savedMessages);
    }
}
