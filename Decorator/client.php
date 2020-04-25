<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Decorator;

require __DIR__ . '/../vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Decorator\ConcreteComponent\PlainText;
use DoYouPhp\PhpDesignPattern\Decorator\ConcreteDecorator\DoubleByteText;
use DoYouPhp\PhpDesignPattern\Decorator\ConcreteDecorator\UpperCaseText;

function decorate(string $text, array $decorate = []) : void
{
    $text_object = new PlainText();
    $text_object->setText($text);

    foreach ($decorate as $val) {
        switch ($val) {
            case 'double':
                $text_object = new DoubleByteText($text_object);

                break;
            case 'upper':
                $text_object = new UpperCaseText($text_object);

                break;
        }
    }
    echo $text_object->getText() . PHP_EOL;
}

$text = 'Hello, Decorator Pattern !!';
decorate($text);
decorate($text, ['double']);
decorate($text, ['upper']);
decorate($text, ['double', 'upper']);
