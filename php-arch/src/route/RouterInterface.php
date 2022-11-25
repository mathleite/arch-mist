<?php

namespace Mathleite\PhpArch\route;

use Mathleite\PhpArch\api\common\interfaces\ControllerResponseInterface;
use Mathleite\PhpArch\api\common\interfaces\RequestInterface;

interface RouterInterface
{
    public function registry(string $uri, string $controller, string $method): void;

    public function dispatch(string $requestAction, ?RequestInterface $request): ControllerResponseInterface;
}