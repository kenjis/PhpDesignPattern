<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Memento;

/**
 * Caretakerに相当する
 */
class DataCaretaker
{
    public function __construct()
    {
        if (! isset($_SESSION)) {
            session_start();
        }
    }

    public function setSnapshot($snapshot) : void
    {
        $this->snapshot = $snapshot;
        $_SESSION['snapshot'] = $this->snapshot;
    }

    public function getSnapshot()
    {
        return isset($_SESSION['snapshot']) ? $_SESSION['snapshot'] : null;
    }
}
