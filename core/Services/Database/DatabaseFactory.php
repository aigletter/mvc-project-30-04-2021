<?php


namespace core\Services\Database;


use core\FactoryAbstract;

class DatabaseFactory extends FactoryAbstract
{
    protected function createConcrete()
    {
        return new Db();
    }
}