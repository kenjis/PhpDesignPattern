<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\ChainOfResponsibility\Handler;

/**
 * Handlerクラスに相当する
 */
abstract class ValidationHandler
{
    private $next_handler;

    public function __construct()
    {
        $this->next_handler = null;
    }

    public function setHandler(self $handler)
    {
        $this->next_handler = $handler;

        return $this;
    }

    public function getNextHandler()
    {
        return $this->next_handler;
    }

    /**
     * チェーンの実行
     */
    public function validate($input)
    {
        $result = $this->execValidation($input);
        if (! $result) {
            return $this->getErrorMessage();
        }
        if ($this->getNextHandler() !== null) {
            return $this->getNextHandler()->validate($input);
        }

        return true;
    }

    /**
     * 自クラスが担当する処理を実行
     */
    abstract protected function execValidation($input);

    /**
     * 処理失敗時のメッセージを取得する
     */
    abstract protected function getErrorMessage();
}
