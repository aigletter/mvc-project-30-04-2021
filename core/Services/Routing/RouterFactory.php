<?php


namespace core\Services\Routing;


use core\FactoryAbstract;

class RouterFactory extends FactoryAbstract
{
    protected function createConcrete()
    {
        return new Router();
    }
}