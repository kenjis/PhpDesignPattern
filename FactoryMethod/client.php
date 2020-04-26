<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\FactoryMethod;

require __DIR__ . '/../vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\FactoryMethod\ConcreteCreator\ReaderFactory;

function show($filename) : void
{
    echo $filename . PHP_EOL;

    $factory = new ReaderFactory();
    $data = $factory->create($filename);
    $data->read();
    $data->display();
}

/*
 * 入力ファイル
 */
show(__DIR__ . '/music.txt');
show(__DIR__ . '/music.xml');
