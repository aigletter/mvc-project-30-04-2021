<?php


namespace core\Services\Files;


use core\FactoryAbstract;

class FileFactory extends FactoryAbstract
{
    protected function createConcrete()
    {
        return new Files();
    }
}