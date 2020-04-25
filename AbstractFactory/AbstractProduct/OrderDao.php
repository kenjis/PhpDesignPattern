<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct;

interface OrderDao
{
    public function findById($order_id);
}
