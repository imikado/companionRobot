<?php

namespace App\Infrastructure\Api;

class MessagesApi
{

    const PATH = '/var/www/data/message.txt';

    public function hasMessage(): bool
    {
        if (file_exists(self::PATH)) {
            return true;
        }
        return false;
    }

    public function getMessage(): string
    {
        $message = file_get_contents(self::PATH);
        return $message;
    }

    public function consumeMessage(): void
    {
        unlink(self::PATH);
    }
}
