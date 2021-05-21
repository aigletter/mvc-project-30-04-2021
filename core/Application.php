<?php


namespace core;


use core\Interfaces\RunnableInterface;
use Psr\Container\ContainerInterface;

/**
 * Class Application
 * @package core
 */
class Application implements RunnableInterface, ContainerInterface
{
    private static $instance;

    protected $services = [];

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

    public static function getInstance($config = [])
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    public function get(string $id)
    {
        if (array_key_exists($id, $this->services)) {
            return $this->services[$id];
        }

        return null;
    }

    public function has(string $id): bool
    {
        // TODO: Implement has() method.
    }

    public function run()
    {
        $action = $this->get('router')->route();

        if ($action) {
            $action($this);
        }

        http_response_code(404);
    }
}