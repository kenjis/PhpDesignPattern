<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Proxy\Subject;

interface ItemDao
{
    public function findById($item_id);
}
