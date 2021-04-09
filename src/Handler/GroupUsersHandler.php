<?php

namespace App\Handler;

use App\DB\RepositoryManager;
use App\DTO\GroupUsersByMessagesDTO;
use App\Entity\Message;

/**
 * Class GroupUsersHandler
 * @package App\Handler
 */
class GroupUsersHandler implements HandlerInterface
{
    private RepositoryManager $rm;

    public function __construct()
    {
        $this->rm = new RepositoryManager();
    }

    public function __invoke(GroupUsersByMessagesDTO $dto): void
    {
        /** @var Message[] $messages */
        $messages = $this->rm->getRepository(Message::class)->findAll(new Message());

        $result = [];

        foreach ($messages as $message) {
            if (!array_key_exists($message->getUserId(), $result)) {
                $result[$message->getUserId()]['category'] = 'SILENT';
            } else {
                $result[$message->getUserId()]['category'] = 'TALKER';
            }

            if (preg_match('[^\W]', $message->getText()) === false) {
                $result[$message->getUserId()]['category'] = 'MEME_LOVER';
            }
        }

        $dto->setResult(['groups' => $result]);
    }
}
