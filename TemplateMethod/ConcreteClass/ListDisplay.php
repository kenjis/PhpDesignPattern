<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\TemplateMethod\ConcreteClass;

use DoYouPhp\PhpDesignPattern\TemplateMethod\AbstractClass\AbstractDisplay;

/**
 * ConcreteClassクラスに相当する
 */
class ListDisplay extends AbstractDisplay
{
    /**
     * ヘッダを表示する
     */
    protected function displayHeader() : void
    {
        echo 'データ一覧' . PHP_EOL;
    }

    /**
     * ボディ（クライアントから渡された内容）を表示する
     */
    protected function displayBody() : void
    {
        foreach ($this->getData() as $value) {
            echo $value . PHP_EOL;
        }
    }

    /**
     * フッタを表示する
     */
    protected function displayFooter() : void
    {
        // 何もしない
    }
}
