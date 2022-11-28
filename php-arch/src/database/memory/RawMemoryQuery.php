<?php

namespace Mathleite\PhpArch\database\memory;

use Mathleite\PhpArch\api\common\AbstractModel;

class RawMemoryQuery
{
    public function __construct(private readonly AbstractModel $model) {}

    public function getModel(): AbstractModel
    {
        return $this->model;
    }
}