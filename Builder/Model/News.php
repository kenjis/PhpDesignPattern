<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Builder\Model;

/**
 * RSS内の1つの記事を表すクラス
 */
class News
{
    private string $title;
    private string $url;
    private string $target_date;

    public function __construct(string $title, string $url, string $target_date)
    {
        $this->title = $title;
        $this->url = $url;
        $this->target_date = $target_date;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function getUrl() : string
    {
        return $this->url;
    }

    public function getDate() : string
    {
        return $this->target_date;
    }
}
