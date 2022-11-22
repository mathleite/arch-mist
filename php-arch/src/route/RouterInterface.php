<?php

namespace Mathleite\PhpArch\route;

use Mathleite\PhpArch\api\common\interfaces\ControllerResponseInterface;

interface RouterInterface
{
    public function registry(string $uri, string $controller, string $method): void;

    public function dispatch(string $requestAction, array $params): ControllerResponseInterface;
}