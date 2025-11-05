<?php

namespace App\Infrastructure\Pages;

use Dupot\StaticManagementFramework\Render\View;
use Exception;

class MessagesPage extends ProjectPageAbstract
{

    const PAGE = 'messages.html';
    const PAGE_SENT = 'message_sent.html';

    protected $contactList;

    public function loadList()
    {
        $this->contactList = $this->contactApi->getList();
    }

    public function index()
    {
        $this->load();
        $this->loadList();


        $this->processSend();


        $messageList = [
            'eatMessage' => 'Eat Time!'
        ];

        $view = new View(
            __DIR__ . '/View/messages.php',
            [
                'contactList' => $this->contactList,
                'messageList' => $messageList
            ]
        );


        $this->layout->appendContext('contentList', $view);

        return $this->render();
    }

    protected function processSend()
    {
        if (!$this->getRequest()->isMethodPost()) {
            return;
        }

        $postParamList = $this->getRequest()->getPostParamList();

        $to =  $postParamList['to'];

        $url = $this->getContactApiUrl($to);
        $message = $postParamList['message'];

        $ch = curl_init($url . '?message=' . $message);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);


        return $this->getResponse()->redirect(getLink(self::PAGE_SENT));
    }

    protected function getContactApiUrl(string $to)
    {
        foreach ($this->contactList as $contactLoop) {
            if ($to == $contactLoop->name) {
                return $contactLoop->url . '/Api/index.php';
            }
        }
        throw new Exception('Unexpecter contact name:' . $contactLoop->name);
    }

    public function sent()
    {
        $view = new View(
            __DIR__ . '/View/message_sent.php',
            []
        );


        $this->layout->appendContext('contentList', $view);

        return $this->render();
    }
}
