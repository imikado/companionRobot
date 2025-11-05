<?php


require __DIR__ . '/vendor/autoload.php';

use Dupot\StaticManagementFramework\Application;
use Dupot\StaticManagementFramework\Http\Request;
use Dupot\StaticManagementFramework\Http\Response;
use Dupot\StaticManagementFramework\Setup\ConfigManager;
use Dupot\StaticManagementFramework\Setup\RouteManager;

try {
    session_start();

    define('ROOT_PATH', __DIR__ . '/');
    define('PUBLIC_ROOT', '/Display');
    define('ROOT_LINK', PUBLIC_ROOT . '/index.php');

    function getLink(string $page, array $argList = []): string
    {
        if (!empty($argList)) {

            $page = str_replace(array_keys($argList), array_values($argList), $page);
        }

        return ROOT_LINK . '/' . $page;
    }
    function getPublicPath(string $publicPath): string
    {
        return PUBLIC_ROOT . '/' . $publicPath;
    }

    $debug = true;

    $request = new Request([
        Request::SOURCE_GET => $_GET,
        Request::SOURCE_POST => $_POST,
        Request::SOURCE_SESSION => $_SESSION,
        Request::SOURCE_SERVER => $_SERVER
    ]);

    $routeManager = new RouteManager();
    $routeManager->loadConfigFromJson(__DIR__ . '/src/conf/routing.json');

    $configManager = new ConfigManager();
    //$configManager->loadConfigFromIni(__DIR__ . '/../src/conf/yourConfigFile.ini');

    $configManager->setSectionParam('path', 'root', ROOT_PATH);

    $application = new Application([
        Application::CONFIG_MANAGER => $configManager,
        Application::ROUTE_MANAGER => $routeManager,
        Application::REQUEST => $request,
        Application::RESPONSE => new Response()
    ]);
    $application->run();
} catch (Exception $e) {

    if ($debug) {
        print_r($e, true);
    }
}
