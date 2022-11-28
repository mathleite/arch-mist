<?php

namespace Mathleite\PhpArch\api\user\repository;

use Mathleite\PhpArch\api\common\AbstractModel;
use Mathleite\PhpArch\api\common\interfaces\RepositoryInterface;
use Mathleite\PhpArch\database\interfaces\DatabaseDriverInterface;
use Mathleite\PhpArch\database\memory\RawMemoryQuery;

class UserRepository implements RepositoryInterface
{
    private DatabaseDriverInterface $database;

    public function __construct(DatabaseDriverInterface $database)
    {
        $this->database = $database;
    }

    public function insert(AbstractModel $model): bool
    {
        if (!$this->database->isConnected()) {
            $this->database->connect();
        }

        $query = new RawMemoryQuery($model);
        return $this->database->insert($query);
    }

    public function getAll(): array
    {
        if (!$this->database->isConnected()) {
            $this->database->connect();
        }

        return $this->database->get();
    }
}