<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Bridge\Abstraction;

use DoYouPhp\PhpDesignPattern\Bridge\Implementor\DataSource;

class Listing
{
    private DataSource $data_source;

    /**
     * コンストラクタ
     */
    public function __construct(DataSource $data_source)
    {
        $this->data_source = $data_source;
    }

    /**
     * データソースを開く
     */
    public function open() : void
    {
        $this->data_source->open();
    }

    /**
     * データソースからデータを取得する
     *
     * @return string データ
     */
    public function read() : string
    {
        return $this->data_source->read();
    }

    /**
     * データソースを閉じる
     */
    public function close() : void
    {
        $this->data_source->close();
    }
}
