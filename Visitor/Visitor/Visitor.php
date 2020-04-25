<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Visitor\Visitor;

use DoYouPhp\PhpDesignPattern\Visitor\Element\OrganizationEntry;

interface Visitor
{
    public function visit(OrganizationEntry $entry);
}
