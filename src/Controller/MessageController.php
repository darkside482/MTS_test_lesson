<?php

namespace Controller;

use App\DTO\CountUserMessagesDTO;
use App\DTO\GroupUsersByMessagesDTO;
use App\DTO\SaveMessagesDTO;
use App\Handler\GetUserMessagesCount;
use App\Handler\SaveMessagesHandler;

/**
 * Class MessageController
 * @package App\Controller
 */
class MessageController extends AbstractController
{
    /**
     * @param array $request
     * @return array
     */
    public static function writeMessages(array $request): array
    {
        $saveMessagesDto = new SaveMessagesDTO($request['messages']);

        /** @see SaveMessagesHandler::__invoke() */
        static::dispatch($saveMessagesDto);

        return $saveMessagesDto->getSavedMessages();
    }

    /**
     * @param array $request
     * @return array
     */
    public static function countUserMessages(array $request): array
    {
        $countUserMessages = new CountUserMessagesDTO($request['uuid'], $request['from'] ?? null, $request['to'] ?? null);

        /** @see GetUserMessagesCount::__invoke() */
        static::dispatch($countUserMessages);

        return $countUserMessages->getMessagesCount();
    }

    /**
     * @param array $request
     * @return array
     */
    public static function groupUsersByMessages(array $request): array
    {
        $groupUsersByMessages = new GroupUsersByMessagesDTO();

        /** @see GroupUsersHandler::__invoke() */
        static::dispatch($groupUsersByMessages);

        return $groupUsersByMessages->getResult();
    }
}