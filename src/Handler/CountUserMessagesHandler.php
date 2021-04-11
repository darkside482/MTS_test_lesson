<?php

namespace Handler;

use DB\RepositoryManager;
use DTO\CountUserMessagesDTO;
use Entity\Message;
use Repository\MessageRepository;

/**
 * Class CountUserMessagesHandler
 * @package Handler
 */
class CountUserMessagesHandler implements HandlerInterface
{
    private RepositoryManager $rm;

    public function __construct()
    {
        $this->rm = new RepositoryManager();
    }

    public function __invoke(CountUserMessagesDTO $dto): void
    {
        /** @var MessageRepository $repository */
        $repository = $this->rm->getRepository(Message::class);

        $countedMessages = $repository->count(['user_id' => $dto->getUserId(), 'from' => $dto->getFrom(), 'to' => $dto->getTo()]);

        $dto->setMessagesCount($countedMessages);
    }
}
