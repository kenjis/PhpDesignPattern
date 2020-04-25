<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Observer;

/**
 * ConcreteObserverクラスに相当する
 */
class LoggingListener implements CartListener
{
    public function __construct()
    {
    }

    public function update(Cart $cart) : void
    {
        echo var_export($cart->getItems(), true) . PHP_EOL;
    }
}
