<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Adapter\Ext\Target;

interface DisplaySourceFile
{
    /**
     * 指定されたソースファイルをハイライト表示する
     */
    public function display();
}
