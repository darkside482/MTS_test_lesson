<?php

namespace Handler;

use DB\RepositoryManager;
use Dto\SaveMessagesDTO;
use Entity\Message;
use Entity\User;

/**
 * Class MessageHandler
 * @package Handler
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
        $savedMessages = ['saved' => 0, 'messageIds' => []];

        foreach ($messages->getMessages() as $message) {
            if ($message->getUser()->getRole() === User::ROLE_ADMIN) {
                $userMessage = new Message();
                $userMessage
                    ->setDate($message->getDate())
                    ->setId($message->getUserMessageDto()->getUuid())
                    ->setUserId($message->getUser()->getUuid())
                    ->setText($message->getUserMessageDto()->getText());

                $this->rm->getRepository(Message::class)->insert($userMessage);

                $savedMessages['saved'] += 1;
                $savedMessages['messageIds'][] = $userMessage->getId();
            }
        }

        $messages->setSavedMessages($savedMessages);
    }
}
