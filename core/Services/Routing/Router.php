<?php


namespace core\Services\Routing;


use core\Interfaces\RoutingInterface;

class Router implements RoutingInterface
{
    protected $routes = [];

    public function __construct()
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/../routes/routes.php';
    }

    public function get(string $path, callable $action)
    {
        $this->routes['GET'][$path] = $action;
    }

    public function route()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            return $this->routes[$method][$path];
        }

        return null;
    }
}