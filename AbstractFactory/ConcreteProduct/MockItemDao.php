<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteProduct;

use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct\ItemDao;
use DoYouPhp\PhpDesignPattern\AbstractFactory\Model\Item;

class MockItemDao implements ItemDao
{
    public function findById($item_id)
    {
        return new Item('99', 'ダミー商品');
    }
}
