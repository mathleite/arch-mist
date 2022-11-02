<?php

namespace Mathleite\PhpArch\api\common\interfaces;

use Mathleite\PhpArch\api\common\responses\JsonResponse;

interface ControllerInterface
{
    public function index(): JsonResponse;
}