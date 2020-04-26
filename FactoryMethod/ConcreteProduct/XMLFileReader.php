<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\FactoryMethod\ConcreteProduct;

use DoYouPhp\PhpDesignPattern\FactoryMethod\Product\Reader;
use RuntimeException;
use SimpleXMLElement;

/**
 * XMLファイルの読み込みを行うクラス
 */
class XMLFileReader implements Reader
{
    /**
     * 内容を表示するファイル名
     */
    private string $filename;

    /**
     * データを扱うハンドラ名
     *
     * @var SimpleXMLElement
     */
    private $handler;

    /**
     * コンストラクタ
     *
     * @param string $filename ファイル名
     *
     * @throws RuntimeException
     */
    public function __construct(string $filename)
    {
        if (! is_readable($filename)) {
            throw new RuntimeException('file ' . $filename . ' is not readable !');
        }
        $this->filename = $filename;
    }

    /**
     * 読み込みを行う
     */
    public function read() : void
    {
        $this->handler = simplexml_load_file($this->filename);
    }

    /**
     * 表示を行う
     */
    public function display() : void
    {
        foreach ($this->handler->artist as $artist) {
            echo $artist['name'] . PHP_EOL;
            foreach ($artist->music as $music) {
                printf('-->%s%s', $music['name'], PHP_EOL);
            }
        }
    }
}
