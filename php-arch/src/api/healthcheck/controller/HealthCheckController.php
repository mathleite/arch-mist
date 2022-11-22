<?php

namespace Mathleite\PhpArch\api\healthcheck\controller;

use Mathleite\PhpArch\api\common\interfaces\ControllerInterface;
use Mathleite\PhpArch\api\common\interfaces\ControllerResponseInterface;
use Mathleite\PhpArch\api\common\responses\JsonResponse;

class HealthCheckController implements ControllerInterface
{
    public function index(): ControllerResponseInterface
    {
        return JsonResponse::getInstance()
            ->setData(['status' => 'OK', 'timestamp' => date('Y-m-d H:i:s')])
            ->setStatusCode(200);
    }
}