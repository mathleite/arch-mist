<?php

namespace Mathleite\PhpArch\api\user\model;

use Mathleite\PhpArch\api\common\AbstractModel;
use Mathleite\PhpArch\api\common\interfaces\AuthenticateInterface;

class UserModel extends AbstractModel implements AuthenticateInterface
{
    protected ?string $name = null;
    protected ?string $lastName = null;
    protected ?string $passwordHash = null;
    protected ?string $password = null;

    protected array $fillables = [
        'name',
        'lastName',
        'password',
    ];

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getPasswordHash(): ?string
    {
        return $this->passwordHash;
    }

    public function toArray(bool $onlyFillables = false): array
    {
        $data = parent::toArray($onlyFillables);
        if (array_key_exists('password', $data)) {
            unset($data['password']);
        }
        return $data;
    }
}