<?php

namespace Mathleite\PhpArch\database\memory;

use Mathleite\PhpArch\api\common\models\AbstractModel;
use Mathleite\PhpArch\database\memory\model\QueryStructureModel;

class RawMemoryQuery
{
    private const QUERY_IDENTIFIER = 'MEMORY_QUERY_';

    public function __construct(private readonly AbstractModel $model) {}

    public function getInsertStructure(): QueryStructureModel
    {
        $now = date('Y-m-d H:i:s');
        $id = $this->createUniqueIdentifier();
        return new QueryStructureModel([
            'uuid' => $id,
            'data' => $this->model->toArray(),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    private function createUniqueIdentifier(): string
    {
        return uniqid(self::QUERY_IDENTIFIER);
    }
}