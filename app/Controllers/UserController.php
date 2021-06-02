<?php


namespace app\Controllers;


use core\Application;
use core\Services\Cache\Cache;

class UserController
{
    /**
     * @param $id
     * @link https://github.com
     * @see Cache::put()
     */
    public function viewAction()
    {
        $app = Application::getInstance();

        $router = $app->router->route();

        echo $app->hello('Ivan');

        $cache = Application::getInstance()->cache;
        $cache->put('test', 'hello world');

        $files = Application::getInstance()->get('files');
        $files->hello();

        $db = Application::getInstance()->get('db');
        $db->connect();

        echo 'Run UserController view action';
    }
}