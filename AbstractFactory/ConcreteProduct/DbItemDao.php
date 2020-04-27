<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\AbstractFactory\ConcreteProduct;

use DoYouPhp\PhpDesignPattern\AbstractFactory\AbstractProduct\ItemDao;
use DoYouPhp\PhpDesignPattern\AbstractFactory\Model\Item;

class DbItemDao implements ItemDao
{
    private array $items;

    public function __construct()
    {
        $fp = fopen(__DIR__ . '/../item_data.txt', 'r');

        /**
         * ヘッダ行を抜く
         */
        $dummy = fgets($fp, 4096);

        $this->items = [];
        while (($buffer = fgets($fp, 4096)) !== false) {
            $data = explode("\t", trim($buffer));
            if (count($data) !== 2) {
                continue;
            }
            list($item_id, $item_name) = $data;

            $item = new Item($item_id, $item_name);
            $this->items[$item->getId()] = $item;
        }

        fclose($fp);
    }

    public function findById(string $item_id) : ?Item
    {
        if (array_key_exists($item_id, $this->items)) {
            return $this->items[$item_id];
        }

        return null;
    }
}
