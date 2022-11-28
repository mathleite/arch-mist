<?php

namespace Mathleite\PhpArch\database\interfaces;

use Mathleite\PhpArch\database\memory\RawMemoryQuery;

interface DatabaseDriverInterface
{
    public function connect(): bool;

    public function disconnect(): bool;

    public function isConnected(): bool;

    public function insert(RawMemoryQuery $memoryQuery): bool;

    public function get(): array;
}