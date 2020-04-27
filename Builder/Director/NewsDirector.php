<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Builder\Director;

use DoYouPhp\PhpDesignPattern\Builder\Builder\NewsBuilder;
use DoYouPhp\PhpDesignPattern\Builder\Model\News;

/**
 * Directorクラスに相当する
 */
class NewsDirector
{
    private NewsBuilder $builder;
    private string $url;

    public function __construct(NewsBuilder $builder, string $url)
    {
        $this->builder = $builder;
        $this->url = $url;
    }

    /**
     * @return News[]
     */
    public function getNews() : array
    {
        return $this->builder->parse($this->url);
    }
}
