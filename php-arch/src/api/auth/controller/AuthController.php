<?php

namespace Mathleite\PhpArch\api\auth\controller;

use Mathleite\PhpArch\api\common\interfaces\ControllerInterface;
use Mathleite\PhpArch\api\common\interfaces\ControllerResponseInterface;
use Mathleite\PhpArch\api\common\interfaces\RequestInterface;
use Mathleite\PhpArch\api\common\responses\JsonResponse;
use Mathleite\PhpArch\api\user\repository\UserRepository;
use Mathleite\PhpArch\api\user\service\UserService;
use Mathleite\PhpArch\database\DatabaseFactory;
use Mathleite\PhpArch\database\enums\DatabaseTypeEnum;

class AuthController implements ControllerInterface
{
    private UserService $service;

    public function __construct()
    {
        $this->service = new UserService(
            new UserRepository(
                DatabaseFactory::construct(DatabaseTypeEnum::tryFrom(getenv('DATABASE_TYPE')))
            )
        );
    }

    public function index(): ControllerResponseInterface
    {
        return JsonResponse::getInstance()
            ->setData($this->service->getAllUsers())
            ->setStatusCode(200);
    }

    public function create(?RequestInterface $request): ControllerResponseInterface
    {
        if (empty($request) || empty($request->getBody())) {
            return JsonResponse::getInstance()
                ->setData(['message' => 'Empty body'])
                ->setStatusCode(400);
        }

        return JsonResponse::getInstance()
            ->setData([
                'success' => $this->service->createUser($request),
                'data' => $this->service->getAllUsers()
            ])
            ->setStatusCode(201);
    }
}