<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractFactory;

use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct\ItemDao;
use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct\OrderDao;

interface DaoFactory
{
    public function createItemDao() : ItemDao;

    public function createOrderDao() : OrderDao;
}
