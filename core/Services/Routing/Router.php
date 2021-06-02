<?php

/**
 * @version 1.0
 * @author Yurii Orlyk <aigletter@gmail.com>
 */

namespace core\Services\Routing;


use core\Interfaces\RoutingInterface;

/**
 * Class Router
 * @package core
 */
class Router implements RoutingInterface
{
    /**
     * Массив роутов
     * Добавлять можно с помощью метода get
     * @see Router::get()
     * @var array
     */
    protected $routes = [];

    /**
     * Router constructor.
     *
     * @todo Оптимизировать
     */
    public function __construct()
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/../routes/routes.php';
    }

    /**
     * @param string $path Путь, по которому будет отрабатывать определенный колбек
     * @param callable $action Колбек
     *
     * @deprecated
     */
    public function get(string $path, callable $action)
    {
        $this->routes['GET'][$path] = $action;
    }

    /**
     * Будет возвращать callable обьект, который нужно вызывать по определенному роуту
     * @return mixed|null
     * @throws \Exception|\RuntimeException
     */
    public function route()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            return $this->routes[$method][$path];
        }

        //throw new \Exception('Not found', 404);
        return null;
    }
}