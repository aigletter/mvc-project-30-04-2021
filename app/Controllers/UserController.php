<?php


namespace app\Controllers;


use core\Application;

class UserController
{
    public function viewAction()
    {
        $cache = Application::getInstance()->get('cache');
        $cache->put('test', 'hello world');

        $files = Application::getInstance()->get('files');
        $files->hello();

        $db = Application::getInstance()->get('db');
        $db->connect();

        echo 'Run UserController view action';
    }
}