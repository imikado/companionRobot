<?php

namespace App\Infrastructure\Pages;

use Dupot\StaticManagementFramework\Render\View;

class MenuPage extends ProjectPageAbstract
{
    const PAGE = 'menu.html';

    public function index()
    {
        //$errorList = $this->processLogin();

        $view = new View(
            __DIR__ . '/View/menu.php',
            []
        );

        $this->layout->appendContext('contentList', $view);

        return $this->render();
    }
}
