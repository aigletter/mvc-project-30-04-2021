<?php


namespace core\Services\Cache;


use core\FactoryAbstract;

class CacheFactory extends FactoryAbstract
{
    protected function createConcrete()
    {
        return new Cache('cache');
    }
}