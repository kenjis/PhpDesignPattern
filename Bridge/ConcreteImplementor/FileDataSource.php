<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Bridge\ConcreteImplementor;

use DoYouPhp\PhpDesignPattern\Bridge\Implementor\DataSource;
use RuntimeException;

class FileDataSource implements DataSource
{
    /**
     * ソース名
     */
    private string $source_name;

    /**
     * ファイルハンドラ
     *
     * @var resource
     */
    private $handler;

    /**
     * コンストラクタ
     *
     * @param $source_name string ファイル名
     */
    public function __construct(string $source_name)
    {
        $this->source_name = $source_name;
    }

    /**
     * データソースを開く
     *
     * @throws RuntimeException
     */
    public function open() : void
    {
        if (! is_readable($this->source_name)) {
            throw new RuntimeException('データソースが見つかりません');
        }
        $this->handler = fopen($this->source_name, 'r');
        if (! $this->handler) {
            throw new RuntimeException('データソースのオープンに失敗しました');
        }
    }

    /**
     * データソースからデータを取得する
     *
     * @return string データ文字列
     */
    public function read() : string
    {
        $buffer = [];
        while (! feof($this->handler)) {
            $buffer[] = fgets($this->handler);
        }

        return trim(implode($buffer));
    }

    /**
     * データソースを閉じる
     */
    public function close() : void
    {
        if ($this->handler !== null) {
            fclose($this->handler);
        }
    }
}
