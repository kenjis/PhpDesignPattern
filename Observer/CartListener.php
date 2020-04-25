<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Observer;

/**
 * Observerクラスに相当する
 */
interface CartListener
{
    public function update(Cart $cart);
}
