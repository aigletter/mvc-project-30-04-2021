<?php


namespace core\Services\Logging;


use core\FactoryAbstract;

class LoggerFactory extends FactoryAbstract
{
    protected function createConcrete()
    {
        return new Logger();
    }
}