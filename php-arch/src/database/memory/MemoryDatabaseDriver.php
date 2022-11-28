<?php

namespace Mathleite\PhpArch\database\memory;

use Mathleite\PhpArch\database\interfaces\DatabaseDriverInterface;

class MemoryDatabaseDriver implements DatabaseDriverInterface
{
    private const MEMORY_DATABASE = 'MEMORY_DATABASE';
    private const SESSION_SAVE_PATH = __DIR__ . '/data';

    private MemoryDatabase $database;

    public function __construct()
    {
        if (empty($this->database)) {
            $this->database = new MemoryDatabase(self::MEMORY_DATABASE);
        }
    }

    public function connect(): bool
    {
        session_name(self::MEMORY_DATABASE);
        session_save_path(self::SESSION_SAVE_PATH);
        session_start();
        $_SESSION[self::MEMORY_DATABASE] = $_SESSION[self::MEMORY_DATABASE] ?? [];
        return true;
    }

    public function disconnect(): bool
    {
        unset($_SESSION[self::MEMORY_DATABASE]);
        session_destroy();
        return true;
    }

    public function isConnected(): bool
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    public function insert(RawMemoryQuery $memoryQuery): bool
    {
        return $this->database->insertQuery($memoryQuery);
    }

    public function get(): array
    {
        return $this->database->getRecords();
    }
}