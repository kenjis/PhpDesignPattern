<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Interpreter\NonterminalExpression;

use DoYouPhp\PhpDesignPattern\Interpreter\AbstractExpression\Command;
use DoYouPhp\PhpDesignPattern\Interpreter\Context\Context;
use DoYouPhp\PhpDesignPattern\Interpreter\TerminalExpression\CommandCommand;

class CommandListCommand implements Command
{
    public function execute(Context $context) : void
    {
        while (true) {
            $current_command = $context->getCurrentCommand();
            if ($current_command === null) {
                throw new \RuntimeException('"end" not found ');
            }
            if ($current_command === 'end') {
                break;
            }
            $command = new CommandCommand();
            $command->execute($context);

            $context->next();
        }
    }
}
