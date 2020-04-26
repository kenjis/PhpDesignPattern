<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\AbstractFactory\Model;

/**
 * 1つの注文を表すクラス
 */
class Order
{
    private string $id;
    private array $items;

    public function __construct(string $id)
    {
        $this->id = $id;
        $this->items = [];
    }

    public function addItem(Item $item) : void
    {
        $id = $item->getId();
        if (! array_key_exists($id, $this->items)) {
            $this->items[$id]['object'] = $item;
            $this->items[$id]['amount'] = 0;
        }
        $this->items[$id]['amount']++;
    }

    public function getItems() : array
    {
        return $this->items;
    }

    public function getId() : string
    {
        return $this->id;
    }
}
