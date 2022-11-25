<?php

namespace Mathleite\PhpArch\database;

use Mathleite\PhpArch\database\enums\DatabaseTypeEnum;
use Mathleite\PhpArch\database\interfaces\DatabaseDriverInterface;
use Mathleite\PhpArch\database\memory\MemoryDatabaseDriver;

class DatabaseFactory
{
    public static function construct(DatabaseTypeEnum $databaseType): DatabaseDriverInterface
    {
        return match ($databaseType) {
            DatabaseTypeEnum::NOSQL, DatabaseTypeEnum::SQL => throw new \Exception('To be implemented'),
            default => MemoryDatabaseDriver::getInstance()
        };
    }
}