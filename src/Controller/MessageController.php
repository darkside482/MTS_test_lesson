<?php

namespace Controller;

use DTO\CountUserMessagesDTO;
use DTO\GroupUsersByMessagesDTO;
use DTO\SaveMessagesDTO;
use Handler\CountUserMessagesHandler;
use Handler\GroupUsersByMessagesHandler;
use Handler\SaveMessagesHandler;

/**
 * Class MessageController
 * @package Controller
 */
class MessageController extends AbstractController
{
    /**
     * @param array $request
     * @return array
     */
    public static function writeMessages(array $request): array
    {
        $saveMessagesDto = new SaveMessagesDTO(json_decode($request['messages'], true));

        /** @see SaveMessagesHandler::__invoke() */
        static::dispatch($saveMessagesDto);

        return $saveMessagesDto->getSavedMessages();
    }

    /**
     * @param string $userId
     * @param array $request
     * @return array
     */
    public static function countUserMessages(string $userId, array $request): array
    {
        $countUserMessages = new CountUserMessagesDTO($userId, $request['from'] ?? null, $request['to'] ?? null);

        /** @see CountUserMessagesHandler::__invoke() */
        static::dispatch($countUserMessages);

        return ['user_id' => $userId, 'messagesCount' => $countUserMessages->getMessagesCount()];
    }

    /**
     * @param array $request
     * @return array
     */
    public static function groupUsersByMessages(array $request): array
    {
        $groupUsersByMessages = new GroupUsersByMessagesDTO($request['group']);

        /** @see GroupUsersByMessagesHandler::__invoke() */
        static::dispatch($groupUsersByMessages);

        return $groupUsersByMessages->getResult();
    }
}