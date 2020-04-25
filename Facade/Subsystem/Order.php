<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Facade\Subsystem;

class Order
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function addItem(OrderItem $order_item) : void
    {
        $this->items[$order_item->getItem()->getId()] = $order_item;
    }

    public function getItems()
    {
        return $this->items;
    }
}
