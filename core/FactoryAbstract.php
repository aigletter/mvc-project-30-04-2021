<?php


namespace core;


abstract class FactoryAbstract
{
    public function createInstance()
    {
        return $this->createConcrete();
    }

    abstract protected function createConcrete();
}