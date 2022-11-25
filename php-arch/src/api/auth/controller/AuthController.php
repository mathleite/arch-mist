<?php

namespace Mathleite\PhpArch\api\auth\controller;

use Mathleite\PhpArch\api\common\interfaces\ControllerInterface;
use Mathleite\PhpArch\api\common\interfaces\ControllerResponseInterface;
use Mathleite\PhpArch\api\common\interfaces\RequestInterface;
use Mathleite\PhpArch\api\common\responses\JsonResponse;
use Mathleite\PhpArch\api\user\model\UserModel;

class AuthController implements ControllerInterface
{
    public function index(): ControllerResponseInterface
    {
        $user = new UserModel();
        return JsonResponse::getInstance()
            ->setData($user->toArray())
            ->setStatusCode(201);
    }

    public function create(RequestInterface $request): ControllerResponseInterface
    {
        $user = new UserModel($request->getBody());
        return JsonResponse::getInstance()
            ->setData($user->toArray())
            ->setStatusCode(201);
    }
}