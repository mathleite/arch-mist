<?php

namespace Mathleite\PhpArch\database\memory\model;

use Mathleite\PhpArch\api\common\models\AbstractModel;

class QueryStructureModel extends AbstractModel
{
    protected string $uuid;
    protected array $data;
    protected string $created_at;
    protected string $updated_at;

    protected array $fillables = [
        'uuid',
        'data',
        'created_at',
        'updated_at'
    ];

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }
}