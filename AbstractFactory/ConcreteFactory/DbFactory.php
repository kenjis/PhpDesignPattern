<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteFactory;

use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractFactory\DaoFactory;
use DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteProduct\DbItemDao;
use DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteProduct\DbOrderDao;

class DbFactory implements DaoFactory
{
    public function createItemDao() : DbItemDao
    {
        return new DbItemDao();
    }

    public function createOrderDao() : DbOrderDao
    {
        return new DbOrderDao($this->createItemDao());
    }
}
