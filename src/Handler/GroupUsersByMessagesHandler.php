<?php

namespace Handler;

use DB\RepositoryManager;
use DTO\GroupUsersByMessagesDTO;
use Entity\Message;
use Repository\MessageRepository;

/**
 * Class GroupUsersByMessagesHandler
 * @package Handler
 */
class GroupUsersByMessagesHandler implements HandlerInterface
{
    private RepositoryManager $rm;

    public function __construct()
    {
        $this->rm = new RepositoryManager();
    }

    public function __invoke(GroupUsersByMessagesDTO $dto): void
    {
        /** @var MessageRepository $messages */
        $messageRepository = $this->rm->getRepository(Message::class);

        $result = $messageRepository->groupUsersByMessages($dto->getGroup());

        $dto->setResult(['userIds' => $result]);
    }
}
