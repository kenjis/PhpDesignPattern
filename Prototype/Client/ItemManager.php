<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Prototype\Client;

use DoYouPhp\PhpDesignPattern\Prototype\Prototype\ItemPrototype;

/**
 * Clientクラスに相当する
 * このクラスからはConcretePrototypeクラスは見えていない
 */
class ItemManager
{
    /**
     * @var ItemPrototype[]
     */
    private array $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function registItem(ItemPrototype $item) : void
    {
        $this->items[$item->getCode()] = $item;
    }

    /**
     * Prototypeクラスのメソッドを使って、新しいインスタンスを作成
     */
    public function create(string $item_code)
    {
        if (! array_key_exists($item_code, $this->items)) {
            throw new \Exception('item_code [' . $item_code . '] not exists !');
        }

        return $this->items[$item_code]->newInstance();
    }
}
