<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Prototype\Prototype;

use stdClass;

/**
 * Prototypeクラスに相当する
 */
abstract class ItemPrototype
{
    private string $item_code;
    private string $item_name;
    private int $price;
    private stdClass $detail;

    public function __construct(string $code, string $name, int $price)
    {
        $this->item_code = $code;
        $this->item_name = $name;
        $this->price = $price;
    }

    /**
     * protectedメソッドにする事で、外部から直接cloneされない
     * ようにしている
     */
    abstract protected function __clone();

    public function getCode() : string
    {
        return $this->item_code;
    }

    public function getName() : string
    {
        return $this->item_name;
    }

    public function getPrice() : int
    {
        return $this->price;
    }

    public function setDetail(stdClass $detail) : void
    {
        $this->detail = $detail;
    }

    public function getDetail() : stdClass
    {
        return $this->detail;
    }

    public function dumpData() : void
    {
        echo $this->getName() . PHP_EOL;
        echo '商品番号：' . $this->getCode() . PHP_EOL;
        echo '\\' . number_format($this->getPrice()) . PHP_EOL;
        echo $this->detail->comment . PHP_EOL;
    }

    /**
     * cloneキーワードを使って新しいインスタンスを作成する
     */
    public function newInstance() : self
    {
        return clone $this;
    }
}
