<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Command\Invoker;

use DoYouPhp\PhpDesignPattern\Command\Command\Command;

/**
 * Invokerクラスに相当する
 */
class Queue
{
    private $commands;
    private $current_index;

    public function __construct()
    {
        $this->commands = [];
        $this->current_index = 0;
    }

    public function addCommand(Command $command) : void
    {
        $this->commands[] = $command;
    }

    public function run() : void
    {
        while (($command = $this->next()) !== null) {
            $command->execute();
        }
    }

    private function next()
    {
        if (count($this->commands) === 0 ||
            count($this->commands) <= $this->current_index) {
            return;
        }

        return $this->commands[$this->current_index++];
    }
}
