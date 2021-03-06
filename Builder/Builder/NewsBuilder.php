<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Builder\Builder;

/**
 * Builderクラスに相当する
 */
interface NewsBuilder
{
    public function parse(string $data) : array;
}
