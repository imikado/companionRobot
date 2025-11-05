<?php

namespace App\Infrastructure\Pages;

use App\Infrastructure\Api\ContactApi;
use Dupot\StaticManagementFramework\Page\PageAbstract;
use Dupot\StaticManagementFramework\Render\Layout;

abstract class ProjectPageAbstract extends PageAbstract
{
    protected $layout = null;
    protected $contactApi;

    public function __construct()
    {
        $this->layout = new Layout(__DIR__ . '/Layouts/default.php');
    }


    public function load()
    {
        $this->contactApi = new ContactApi();
    }

    public function render()
    {

        echo $this->layout->render();
    }
}
