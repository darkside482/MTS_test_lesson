<?php

namespace App\Handler;

use App\DB\RepositoryManager;
use App\DTO\CountUserMessagesDTO;
use App\Entity\Message;
use App\Repository\Message\MessageRepository;

/**
 * Class GetUserMessagesCount
 * @package App\Handler
 */
class GetUserMessagesCount implements HandlerInterface
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

        $countedMessages = $repository->count(['uuid' => $dto->getUserId(), 'from' => $dto->getFrom(), 'to' => $dto->getTo()]);

        $dto->setMessagesCount($countedMessages);
    }
}
