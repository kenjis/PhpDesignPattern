<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct;

use DoYouPhp\PhpDesignPattern\AbstractFactory\Model\Order;

interface OrderDao
{
    public function findById(string $order_id) : ?Order;
}
