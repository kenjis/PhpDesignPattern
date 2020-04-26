<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\FactoryMethod\Product;

/**
 * 読み込み機能を表すインターフェースクラス
 */
interface Reader
{
    public function read() : void;

    public function display() : void;
}
