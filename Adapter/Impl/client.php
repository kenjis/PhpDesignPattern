<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\Adapter\Impl;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Adapter\Impl\Adapter\DisplaySourceFileImpl;

/**
 * DisplaySourceFileImplクラスをインスタンス化する。
 * 内容を表示するファイルは、「ShowFile.php」
 */
$show_file = new DisplaySourceFileImpl(dirname(__DIR__) . '/ShowFile.php');

/*
 * プレーンテキストとハイライトしたファイル内容をそれぞれ
 * 表示する
 */
$show_file->display();
