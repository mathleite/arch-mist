<?php

namespace Mathleite\PhpArch\api\common\interfaces;

use Mathleite\PhpArch\api\common\models\AbstractModel;

interface RepositoryInterface
{
    public function insert(AbstractModel $model): bool;

    public function getAll(): array;
}