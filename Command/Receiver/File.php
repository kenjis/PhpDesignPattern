<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Command\Receiver;

/**
 * Receiverクラスに相当する
 */
class File
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function decompress() : void
    {
        echo $this->name . 'を展開しました' . PHP_EOL;
    }

    public function compress() : void
    {
        echo $this->name . 'を圧縮しました' . PHP_EOL;
    }

    public function create() : void
    {
        echo $this->name . 'を作成しました' . PHP_EOL;
    }
}
