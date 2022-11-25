<?php

namespace Mathleite\PhpArch\api\user\model;

use Mathleite\PhpArch\api\common\AbstractModel;

class UserModel extends AbstractModel
{
    protected ?string $name = null;
    protected ?string $lastName = null;
    protected ?string $passwordHash = null;

    protected array $fillables = [
        'name',
        'lastName'
    ];

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }
}