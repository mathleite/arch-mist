<?php

namespace Mathleite\PhpArch\api\user\service;

use Mathleite\PhpArch\api\common\interfaces\RequestInterface;
use Mathleite\PhpArch\api\user\model\UserModel;
use Mathleite\PhpArch\api\user\repository\UserRepository;

class UserService
{
    public function getAllUsers(): array
    {
        $repository = new UserRepository();
        return $repository->getAll();
    }

    public function createUser(RequestInterface $request): bool
    {
        $user = new UserModel($request->getBody());
        $repository = new UserRepository();
        return $repository->insert($user);
    }
}