<?php


namespace core;


use core\Interfaces\RoutingInterface;
use core\Interfaces\RunnableInterface;
use core\Services\Cache\Cache;
use Psr\Container\ContainerInterface;

/**
 * Class Application
 * @property RoutingInterface $router
 * @property Cache $cache
 *
 * @method hello($name)
 * @package core
 */
class Application implements RunnableInterface, ContainerInterface
{
    /**
     * Экземляр самого класса (singleton)
     * @var Application
     */
    private static $instance;

    /**
     * Массив сервисов
     * @var array
     */
    protected $services = [];

    /**
     * Application constructor.
     * @param array $config Конфигурация
     */
    private function __construct($config)
    {
        $this->config = $config;

        if (isset($config['services'])) {
            foreach ($config['services'] as $key => $item) {
                if (isset($item['factory']) && is_a($item['factory'], FactoryAbstract::class, true)) {
                    $factory = new $item['factory']();
                    $instance = $factory->createInstance();
                    $this->services[$key] = $instance;
                }
            }
        }
    }

    /**
     * Метод возвращает инстранс самого класса
     *
     * @param array $config
     * @return Application
     */
    public static function getInstance($config = [])
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    public function __call($name, $arguments)
    {
        $methodName = 'run' . $name;
        if (method_exists($this, $methodName)) {
            return call_user_func_array([$this, $methodName], $arguments);
        }
    }

    protected function runHello($name)
    {
        return 'Hello ' . $name;
    }

    /**
     * Метод возвращает экземпляр сервиса
     *
     * @param string $id
     * @return mixed|null
     */
    public function get(string $id)
    {
        if (array_key_exists($id, $this->services)) {
            return $this->services[$id];
        }

        return null;
    }

    /**
     * @param string $id
     * @return bool
     */
    public function has(string $id): bool
    {
        // TODO: Implement has() method.
    }

    /**
     * Запускает приложение
     *
     * @todo Сделать обработку исключений, в том числе 404
     */
    public function run()
    {
        /** @var RoutingInterface $router */
        $router = $this->get('router');
        $action = $router->route();

        if ($action) {
            $action();
        }

        http_response_code(404);
    }
}