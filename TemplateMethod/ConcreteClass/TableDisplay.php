<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\TemplateMethod\ConcreteClass;

use DoYouPhp\PhpDesignPattern\TemplateMethod\AbstractClass\AbstractDisplay;

/**
 * ConcreteClassクラスに相当する
 */
class TableDisplay extends AbstractDisplay
{
    /**
     * ヘッダを表示する
     */
    protected function displayHeader() : void
    {
        $this->displayLine();
        echo "キー\t値" . PHP_EOL;
        $this->displayLine();
    }

    /**
     * ボディ（クライアントから渡された内容）を表示する
     */
    protected function displayBody() : void
    {
        foreach ($this->getData() as $key => $value) {
            printf("%s\t%s%s", $key, $value, PHP_EOL);
        }
    }

    /**
     * フッタを表示する
     */
    protected function displayFooter() : void
    {
        $this->displayLine();
    }

    private function displayLine() : void
    {
        echo str_repeat('-', 40) . PHP_EOL;
    }
}
