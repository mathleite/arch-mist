<?php

namespace Mathleite\PhpArch\api\auth\controller;

use Mathleite\PhpArch\api\common\interfaces\ControllerInterface;
use Mathleite\PhpArch\api\common\interfaces\ControllerResponseInterface;
use Mathleite\PhpArch\api\common\interfaces\RequestInterface;
use Mathleite\PhpArch\api\common\responses\JsonResponse;
use Mathleite\PhpArch\api\user\model\UserModel;
use Mathleite\PhpArch\api\user\service\UserService;

class AuthController implements ControllerInterface
{
    public function index(): ControllerResponseInterface
    {
        $user = new UserModel();
        return JsonResponse::getInstance()
            ->setData((new UserService())->getAllUsers())
            ->setStatusCode(200);
    }

    public function create(RequestInterface $request): ControllerResponseInterface
    {
        return JsonResponse::getInstance()
            ->setData([
                'success' => (new UserService())->createUser($request),
                'data' => (new UserService())->getAllUsers()
            ])
            ->setStatusCode(201);
    }
}