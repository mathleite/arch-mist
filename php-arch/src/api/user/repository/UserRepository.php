<?php

namespace Mathleite\PhpArch\api\user\repository;

use Mathleite\PhpArch\api\common\AbstractModel;
use Mathleite\PhpArch\api\common\interfaces\RepositoryInterface;
use Mathleite\PhpArch\database\DatabaseFactory;
use Mathleite\PhpArch\database\enums\DatabaseTypeEnum;
use Mathleite\PhpArch\database\interfaces\DatabaseDriverInterface;
use Mathleite\PhpArch\database\memory\RawMemoryQuery;

class UserRepository implements RepositoryInterface
{
    private DatabaseDriverInterface $database;

    public function __construct(?DatabaseDriverInterface $database = null)
    {
        if (empty($database)) {
            $this->database = $this->getDatabase();
            return;
        }
        $this->database = $database;
    }

    /** @throws \Exception */
    private function getDatabase(): DatabaseDriverInterface
    {
        return DatabaseFactory::construct(DatabaseTypeEnum::tryFrom(getenv('DATABASE_TYPE')));
    }

    public function insert(AbstractModel $model): bool
    {
//        if (!$this->database->isConnected()) {
//            $this->database->connect();
//        }
        $query = new RawMemoryQuery($model);
        $isSaved = $this->database->insert($query);
//        $this->database->disconnect();
        return $isSaved;
    }

    public function getAll(): array
    {
//        if (!$this->database->isConnected()) {
//            $this->database->connect();
//        }
        $records = $this->database->get();
//        $this->database->disconnect();
        return $records;
    }
}