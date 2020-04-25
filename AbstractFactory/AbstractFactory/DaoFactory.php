<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractFactory;

interface DaoFactory
{
    public function createItemDao();

    public function createOrderDao();
}
