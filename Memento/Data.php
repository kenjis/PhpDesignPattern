<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Memento;

/**
 * Originatorに相当する
 */
final class Data extends DataSnapshot
{
    private $comment;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->comment = [];
    }

    /**
     * Mementoを生成する
     */
    public function takeSnapshot()
    {
        return new DataSnapshot($this->comment);
    }

    /**
     * Mementoから復元する
     */
    public function restoreSnapshot(DataSnapshot $snapshot) : void
    {
        $this->comment = $snapshot->getComment();
    }

    public function addComment($comment) : void
    {
        $this->comment[] = $comment;
    }

    public function getComment()
    {
        return $this->comment;
    }
}
