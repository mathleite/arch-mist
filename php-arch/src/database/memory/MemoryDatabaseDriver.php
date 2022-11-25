<?php

namespace Mathleite\PhpArch\database\memory;

use Mathleite\PhpArch\api\common\Singleton;
use Mathleite\PhpArch\database\interfaces\DatabaseDriverInterface;

class MemoryDatabaseDriver implements DatabaseDriverInterface
{
    use Singleton;

    private static bool $isConnected;
    private static MemoryDatabase $database;

    public function __construct()
    {
        if (empty($this->database)) {
            self::$database = new MemoryDatabase();
        }
    }

    public function connect(): bool
    {
        self::$isConnected = true;
        return self::$isConnected;
    }

    public function disconnect(): bool
    {
        self::$isConnected = false;
        return self::$isConnected;
    }

    public function isConnected(): bool
    {
        return self::$isConnected;
    }

    public function insert(RawMemoryQuery $memoryQuery): bool
    {
        return self::$database::insertQuery($memoryQuery);
    }

    public function get(): array
    {
        return self::$database::getRecords();
    }
}