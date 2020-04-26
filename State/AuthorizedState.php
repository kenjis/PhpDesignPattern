<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\State;

/**
 * ConcreteStateクラスに相当する
 * 認証後の状態を表すクラス
 */
class AuthorizedState implements UserState
{
    private static $singleton = null;

    private function __construct()
    {
    }

    /**
     * このインスタンスの複製を許可しないようにする
     *
     * @throws \RuntimeException
     */
    final public function __clone()
    {
        throw new \RuntimeException('Clone is not allowed against ' . get_class($this));
    }

    public static function getInstance()
    {
        if (self::$singleton == null) {
            self::$singleton = new self();
        }

        return self::$singleton;
    }

    public function isAuthenticated()
    {
        return true;
    }

    public function nextState()
    {
        // 次の状態（未認証）を返す
        return UnauthorizedState::getInstance();
    }

    public function getMenu()
    {
        return '<a href="?mode=inc">カウントアップ</a> | '
              . '<a href="?mode=reset">リセット</a> | '
              . '<a href="?mode=state">ログアウト</a>';
    }
}
