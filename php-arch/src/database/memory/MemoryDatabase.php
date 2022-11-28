<?php

namespace Mathleite\PhpArch\database\memory;

class MemoryDatabase
{
    private static array $database = [];

    public static function insertQuery(RawMemoryQuery $memoryQuery): bool
    {
        try {
            $now = date('Y-m-d H:i:s');
            $id = uniqid(self::class);
            self::$database[$id] = [
                'uuid' => $id,
                'data' => $memoryQuery->getModel()->toArray(),
                'created_at' => $now,
                'updated_at' => $now,
            ];
            return true;
        } catch (\Throwable) {
            return false;
        }
    }

    public static function getRecords(): array
    {
        return self::$database;
    }
}