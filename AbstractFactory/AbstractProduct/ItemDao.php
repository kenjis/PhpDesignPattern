<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct;

use DoYouPhp\PhpDesignPattern\AbstractFactory\Model\Item;

interface ItemDao
{
    public function findById(string $item_id) : ?Item;
}
