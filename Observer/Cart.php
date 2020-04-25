<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Observer;

/**
 * Subjectクラス＋ConcreteSubjectクラスに相当する
 */
class Cart
{
    private $items;
    private $listeners;

    public function __construct()
    {
        $this->items = [];
        $this->listeners = [];
    }

    public function addItem($item_cd) : void
    {
        $this->items[$item_cd] = (isset($this->items[$item_cd]) ? ++$this->items[$item_cd] : 1);
        $this->notify();
    }

    public function removeItem($item_cd) : void
    {
        $this->items[$item_cd] = (isset($this->items[$item_cd]) ? --$this->items[$item_cd] : 0);
        if ($this->items[$item_cd] <= 0) {
            unset($this->items[$item_cd]);
        }
        $this->notify();
    }

    public function getItems()
    {
        return $this->items;
    }

    public function hasItem($item_cd)
    {
        return array_key_exists($item_cd, $this->items);
    }

    /**
     * Observerを登録するメソッド
     */
    public function addListener(CartListener $listener) : void
    {
        $this->listeners[get_class($listener)] = $listener;
    }

    /**
     * Observerを削除するメソッド
     */
    public function removeListener(CartListner $listener) : void
    {
        unset($this->listeners[get_class($listener)]);
    }

    /**
     * Observerへ通知するメソッド
     */
    public function notify() : void
    {
        foreach ($this->listeners as $listener) {
            $listener->update($this);
        }
    }

    public function show() : void
    {
        $line = str_repeat('-', 40) . PHP_EOL;

        echo $line;
        echo "商品名\t個数" . PHP_EOL;
        echo $line;
        foreach ($this->getItems() as $item_name => $quantity) {
            echo $item_name . "\t" . $quantity . PHP_EOL;
        }
        echo $line;
    }
}
