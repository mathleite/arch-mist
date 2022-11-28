<?php

namespace Mathleite\PhpArch\api\user\service;

use Mathleite\PhpArch\api\common\interfaces\RepositoryInterface;
use Mathleite\PhpArch\api\common\interfaces\RequestInterface;
use Mathleite\PhpArch\api\user\model\UserModel;

class UserService
{
    public function __construct(private readonly RepositoryInterface $repository) {}

    public function getAllUsers(): array
    {
        return $this->repository->getAll();
    }

    public function createUser(RequestInterface $request): bool
    {
        $user = new UserModel($request->getBody());
        return $this->repository->insert($user);
    }
}