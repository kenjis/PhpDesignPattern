<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Singleton\Singleton;

class SingletonSample
{
    /**
     * メンバー変数
     */
    private $id;

    /**
     * 唯一のインスタンスを保持する変数
     */
    private static $instance;

    /**
     * コンストラクタ
     * IDとして、生成日時のハッシュ値を作成
     */
    private function __construct()
    {
        $this->id = md5(date('r') . mt_rand());
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
     * 唯一のインスタンスを返すためのメソッド
     *
     * @return SingletonSampleインスタンス
     */
    public static function getInstance()
    {
        if (! isset(self::$instance)) {
            self::$instance = new self();
            echo 'a SingletonSample instance was created !';
        }

        return self::$instance;
    }

    /**
     * IDを返す
     *
     * @return インスタンスのID
     */
    public function getID()
    {
        return $this->id;
    }
}
