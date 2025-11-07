<?php

namespace App\Infrastructure\Pages;

use App\Infrastructure\Api\MessagesApi;
use Dupot\StaticManagementFramework\Render\View;

class HomePage extends ProjectPageAbstract
{

    const PAGE = '';
    const PAGE_MESSAGE = 'home_messageid.html';

    public function index()
    {

        $this->layout->setLayoutPath(__DIR__ . '/Layouts/refresh.php');

        $this->checkMessages();

        $view = new View(
            __DIR__ . '/View/home.php',
            []
        );

        $this->layout->appendContext('contentList', $view);

        return $this->render();
    }

    protected function checkMessages()
    {
        $messagesApi = new MessagesApi();
        if ($messagesApi->hasMessage()) {
            $message = $messagesApi->getMessage();
            return $this->getResponse()->redirect(getLink(self::PAGE_MESSAGE, ['messageid' => $message]));
        }
    }

    public function message(string $message)
    {
        $this->layout->setLayoutPath(__DIR__ . '/Layouts/refreshmessage.php');

        $this->processMessage();

        $view = new View(
            __DIR__ . '/View/home_message.php',
            ['message' => $message, 'sound' => '/Display/eatMessage.m4a']
        );

        $this->layout->appendContext('contentList', $view);

        return $this->render();
    }

    public function processMessage()
    {
        $messagesApi = new MessagesApi();
        if ($messagesApi->hasMessage()) {
            $messagesApi->consumeMessage();
        } else {
            return $this->getResponse()->redirect(getLink(self::PAGE, []));
        }
    }
}
