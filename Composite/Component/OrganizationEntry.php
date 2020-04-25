<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Composite\Component;

/**
 * Componentクラスに相当する
 */
abstract class OrganizationEntry
{
    private $code;
    private $name;

    public function __construct($code, $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * 子要素を追加する
     * ここでは抽象メソッドとして用意
     */
    abstract public function add(self $entry);

    /**
     * 組織ツリーを表示する
     * サンプルでは、デフォルトの実装を用意
     */
    public function dump() : void
    {
        printf('%s:%s%s', $this->code, $this->name, PHP_EOL);
    }
}
