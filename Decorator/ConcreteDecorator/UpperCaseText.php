<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Decorator\ConcreteDecorator;

use DoYouPhp\PhpDesignPattern\Decorator\Component\Text;
use DoYouPhp\PhpDesignPattern\Decorator\Decorator\TextDecorator;

/**
 * TextDecoratorクラスの実装クラスです
 */
class UpperCaseText extends TextDecorator
{
    /**
     * インスタンスを生成します
     */
    public function __construct(Text $target)
    {
        parent::__construct($target);
    }

    /**
     * 半角小文字を半角大文字に変換して返します
     */
    public function getText() : string
    {
        $str = parent::getText();

        return mb_strtoupper($str);
    }
}
