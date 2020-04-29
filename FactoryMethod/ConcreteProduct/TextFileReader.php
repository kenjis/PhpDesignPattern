<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\FactoryMethod\ConcreteProduct;

use DoYouPhp\PhpDesignPattern\FactoryMethod\Product\Reader;
use RuntimeException;

/**
 * テキストCSVファイルの読み込みを行うクラス
 */
class TextFileReader implements Reader
{
    /**
     * 内容を表示するファイル名
     */
    private string $filename;

    /**
     * データを扱うハンドラ名
     *
     * @var resource
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
            throw new RuntimeException('file [' . $filename . '] is not readable !');
        }
        $this->filename = $filename;
    }

    /**
     * 読み込みを行う
     */
    public function read() : void
    {
        $this->handler = fopen($this->filename, 'r');
    }

    /**
     * 表示を行う
     */
    public function display() : void
    {
        $prev_artist = null;
        $titles = [];

        while (($buffer = fgets($this->handler, 4096)) !== false) {
            $data = explode("\t", trim($buffer));
            if (count($data) !== 2) {
                continue;
            }
            [$artist, $title] = $data;
            if ($prev_artist === null) {
                $prev_artist = $artist;
            }
            if ($artist !== $prev_artist) {
                $this->displayDetail($prev_artist, $titles);

                $prev_artist = $artist;
                $titles = [];
            }
            $titles[] = $title;
        }

        if (count($titles) > 0) {
            $this->displayDetail($prev_artist, $titles);
        }
    }

    private function displayDetail(string $artist, array $titles = []) : void
    {
        printf('%s%s', $artist, PHP_EOL);
        printf(
            '-->%s%s',
            implode(PHP_EOL . '-->', $titles),
            count($titles) > 0 ? PHP_EOL : null
        );
    }
}
