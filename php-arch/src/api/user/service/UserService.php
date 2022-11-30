<?php

namespace Mathleite\PhpArch\api\user\service;

use Mathleite\PhpArch\api\common\interfaces\RepositoryInterface;
use Mathleite\PhpArch\api\common\interfaces\RequestInterface;
use Mathleite\PhpArch\api\common\services\PasswordService;
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

    public function getUser(RequestInterface $request): array
    {
        $requestBody = $request->getBody();
        if (empty($requestBody['email']) || empty($requestBody['password'])) {
            return [];
        }

        $allUsers = $this->repository->getAll();

        foreach ($allUsers as $identifier => $user) {
            if ($user['data']['email'] !== $requestBody['email']) {
                continue;
            }

            if ((new PasswordService())->verifyHash($requestBody['password'],$user['data']['passwordHash'])) {
                return [$identifier => $user];
            }
        }
        return [];
    }
}