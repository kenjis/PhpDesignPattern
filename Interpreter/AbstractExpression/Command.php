<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Interpreter\AbstractExpression;

use DoYouPhp\PhpDesignPattern\Interpreter\Context\Context;

interface Command
{
    public function execute(Context $context);
}
