<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\FactoryMethod\ConcreteCreator;

use DoYouPhp\PhpDesignPattern\FactoryMethod\ConcreteProduct\TextFileReader;
use DoYouPhp\PhpDesignPattern\FactoryMethod\ConcreteProduct\XMLFileReader;
use DoYouPhp\PhpDesignPattern\FactoryMethod\Product\Reader;

/**
 * Readerクラスのインスタンス生成を行うクラス
 */
class ReaderFactory
{
    /**
     * Readerクラスのインスタンスを生成する
     */
    public function create(string $filename) : Reader
    {
        $reader = $this->createReader($filename);

        return $reader;
    }

    /**
     * Readerクラスのサブクラスを条件判定し、生成する
     */
    private function createReader(string $filename) : Reader
    {
        $postxt = stripos($filename, '.txt');
        $posxml = stripos($filename, '.xml');

        if ($postxt !== false) {
            $r = new TextFileReader($filename);

            return $r;
        }
        if ($posxml !== false) {
            return new XMLFileReader($filename);
        }
        die('This filename is not supported : ' . $filename);
    }
}
