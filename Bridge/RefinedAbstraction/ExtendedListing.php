<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Bridge\RefinedAbstraction;

use DoYouPhp\PhpDesignPattern\Bridge\Abstraction\Listing;
use DoYouPhp\PhpDesignPattern\Bridge\Implementor\DataSource;

/**
 * Listingクラスで提供されている機能を拡張する
 * RefinedAbstractionに相当する
 */
class ExtendedListing extends Listing
{
    /**
     * コンストラクタ
     */
    public function __construct(DataSource $data_source)
    {
        parent::__construct($data_source);
    }

    /**
     * データを読み込む際、大文字に変換する
     *
     * @return string 変換されたデータ
     */
    public function readWithEncode() : string
    {
        return strtoupper($this->read());
    }
}
