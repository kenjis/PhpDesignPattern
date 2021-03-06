<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Builder;

require __DIR__ . '/../vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Builder\ConcreteBuilder\RssNewsBuilder;
use DoYouPhp\PhpDesignPattern\Builder\Director\NewsDirector;

$builder = new RssNewsBuilder();
$url = 'http://www.php.net/news.rss';

$director = new NewsDirector($builder, $url);
foreach ($director->getNews() as $article) {
    printf(
        '[%s] %s%s',
        $article->getDate(),
        $article->getTitle(),
        PHP_EOL
    );
}
