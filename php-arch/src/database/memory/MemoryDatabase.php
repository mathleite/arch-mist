<?php

namespace Mathleite\PhpArch\database\memory;

use Mathleite\PhpArch\database\memory\exceptions\SessionNotStartedException;

class MemoryDatabase
{
    public function __construct(private readonly string $databaseName) {}

    public function insertQuery(RawMemoryQuery $memoryQuery): bool
    {
        $this->validateDatabase();

        $now = date('Y-m-d H:i:s');
        $id = uniqid($this->databaseName);
        $_SESSION[$this->databaseName][$id] = [
            'uuid' => $id,
            'data' => $memoryQuery->getModel()->toArray(),
            'created_at' => $now,
            'updated_at' => $now,
        ];
        return true;
    }

    public function getRecords(): array
    {
        $this->validateDatabase();
        return $_SESSION[$this->databaseName];
    }

    /**
     * @return void
     * @throws SessionNotStartedException
     */
    public function validateDatabase(): void
    {
        if (!array_key_exists($this->databaseName, $_SESSION)) {
            throw new SessionNotStartedException();
        }
    }
}