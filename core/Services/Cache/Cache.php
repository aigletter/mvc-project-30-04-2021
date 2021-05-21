<?php


namespace core\Services\Cache;


class Cache
{
    protected $directory;

    public function __construct($directory)
    {
        $this->directory = $directory;
    }

    public function put($key, $value)
    {
        echo 'Key ' . $key . ' with value ' . $value . ' saved' . '<br>';
    }
}