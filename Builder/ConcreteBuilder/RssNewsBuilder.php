<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Builder\ConcreteBuilder;

use DoYouPhp\PhpDesignPattern\Builder\Builder\NewsBuilder;
use DoYouPhp\PhpDesignPattern\Builder\Model\News;

/**
 * ConcreteBuilderクラスに相当する
 */
class RssNewsBuilder implements NewsBuilder
{
    /**
     * @throws \Exception
     *
     * @return News[]
     */
    public function parse(string $url) : array
    {
        /**
         * RSSファイルを読み込み、SimpleXMLで扱えるようにする
         */
        $data = simplexml_load_file($url);
        if ($data === false) {
            throw new \Exception('read data [' .
                                htmlspecialchars($url, ENT_QUOTES)
                                . '] failed !');
        }

        /**
         * RSSのそれぞれの記事をNewsオブジェクトに変換し、
         * 「Newsオブジェクトの配列」として返す
         */
        $list = [];
        foreach ($data->item as $item) {
            $dc = $item->children('http://purl.org/dc/elements/1.1/');
            $list[] = new News(
                (string) $item->title,
                (string) $item->link,
                (string) $dc->date
            );
        }

        return $list;
    }
}
