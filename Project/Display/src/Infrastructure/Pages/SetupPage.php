<?php

namespace App\Infrastructure\Pages;

use App\Infrastructure\Api\ContactApi;
use Dupot\StaticManagementFramework\Render\View;

class SetupPage extends ProjectPageAbstract
{

    const PAGE_LIST = 'setup.html';
    const PAGE_EDIT = 'setup_edit_id.html';

    const ACTION_ADD = 'add';
    const ACTION_EDIT = 'edit';


    public function index()
    {
        $this->load();

        $this->process();

        $contactList = $this->contactApi->getList();


        $view = new View(
            __DIR__ . '/View/setup_list.php',
            [
                'contactList' => $contactList,
            ]
        );


        $this->layout->appendContext('contentList', $view);

        return $this->render();
    }

    protected function process()
    {
        if (!$this->getRequest()->isMethodPost()) {
            return;
        }

        $postParamList = $this->getRequest()->getPostParamList();

        $action = $postParamList['action'];
        if ($action == self::ACTION_ADD) {
            $this->contactApi->addItem(((object)['name' => '', 'url' => '']));
        }

        return $this->getResponse()->redirect(getLink(self::PAGE_LIST));
    }

    public function edit(int $id)
    {
        $this->load();

        $this->processEdit($id);

        $contact = $this->contactApi->getItem($id);

        $view = new View(
            __DIR__ . '/View/setup_contact_edit.php',
            ['contact' => $contact]
        );


        $this->layout->appendContext('contentList', $view);

        return $this->render();
    }

    protected function processEdit(int $id)
    {
        if (!$this->getRequest()->isMethodPost()) {
            return;
        }

        $postParamList = $this->getRequest()->getPostParamList();

        $action = $postParamList['action'];
        if ($action == self::ACTION_EDIT) {

            $contact = (object)[
                'name' =>   $postParamList['name'],
                'url' =>   $postParamList['url'],
            ];

            $this->contactApi->editItem($id, $contact);
        }


        return $this->getResponse()->redirect(getLink(self::PAGE_LIST));
    }
}
