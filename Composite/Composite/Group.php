<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Composite\Composite;

use DoYouPhp\PhpDesignPattern\Composite\Component\OrganizationEntry;

/**
 * Compositeクラスに相当する
 */
class Group extends OrganizationEntry
{
    private $entries;

    public function __construct($code, $name)
    {
        parent::__construct($code, $name);
        $this->entries = [];
    }

    /**
     * 子要素を追加する
     */
    public function add(OrganizationEntry $entry) : void
    {
        array_push($this->entries, $entry);
    }

    /**
     * 組織ツリーを表示する
     * 自分自身と保持している子要素を表示
     */
    public function dump() : void
    {
        parent::dump();
        foreach ($this->entries as $entry) {
            $entry->dump();
        }
    }
}
