<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Decorator\Component;

/**
 * テキストを扱うインターフェースクラスです
 */
interface Text
{
    public function getText();

    public function setText($str);
}
