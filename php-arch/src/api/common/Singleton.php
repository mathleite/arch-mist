<?php

namespace Mathleite\PhpArch\api\common;

use Mathleite\PhpArch\api\common\interfaces\SingletonInterface;

class Singleton implements SingletonInterface
{
    private static array $instances = [];

    protected function __construct() {}
    protected function __clone() {}

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): SingletonInterface
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}