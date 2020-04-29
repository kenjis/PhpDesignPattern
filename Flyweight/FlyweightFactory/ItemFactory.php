<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Flyweight\FlyweightFactory;

use DoYouPhp\PhpDesignPattern\Flyweight\ConcreteFlyweight\Item;

/**
 * FlyweightFactoryに相当する
 * また、Singletonパターンにもなっている
 *
 * なお、このサンプルではUnsharedConcreteFlyweightオブジェクトを
 * 返すメソッドは用意されていない
 */
class ItemFactory
{
    private $pool;
    private static $instance = null;

    /**
     * コンストラクタ
     * このサンプルでは、インスタンス生成時に保持するオブジェクトを
     * すべて生成している
     */
    private function __construct($filename)
    {
        $this->buildPool($filename);
    }

    /**
     * このインスタンスの複製を許可しないようにする
     *
     * @throws \RuntimeException
     */
    final public function __clone()
    {
        throw new \RuntimeException('Clone is not allowed against ' . get_class($this));
    }

    /**
     * Factoryのインスタンスを返す
     */
    public static function getInstance($filename)
    {
        if (self::$instance === null) {
            self::$instance = new self($filename);
        }

        return self::$instance;
    }

    /**
     * ConcreteFlyweightを返す
     */
    public function getItem($code)
    {
        if (array_key_exists($code, $this->pool)) {
            return $this->pool[$code];
        }
    }

    /**
     * データを読み込み、プールを初期化する
     */
    private function buildPool($filename) : void
    {
        $this->pool = [];

        $fp = fopen($filename, 'r');
        while (($buffer = fgets($fp, 4096)) !== false) {
            $data = explode("\t", trim($buffer));
            if (count($data) !== 3) {
                continue;
            }
            [$item_code, $item_name, $price] = $data;

            $this->pool[$item_code] = new Item($item_code, $item_name, $price);
        }
        fclose($fp);
    }
}
