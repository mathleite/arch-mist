<?php

namespace Mathleite\PhpArch\route;

use InvalidArgumentException;
use Mathleite\PhpArch\api\common\responses\JsonResponse;
use ReflectionException;
use ReflectionMethod;

class SimpleRouter implements RouterInterface
{
    private const NOT_FOUND_CODE = 204;
    private array $routes = [];

    public function dispatch(string $requestAction, array $params = []): JsonResponse
    {
        if (!key_exists($requestAction, $this->routes)) {
            throw new InvalidArgumentException("'$requestAction' is an unregistered route", self::NOT_FOUND_CODE);
        }

        $uriContent = $this->routes[$requestAction];
        $reflectedControllerMethod = self::createReflectionMethod($uriContent);

        return $reflectedControllerMethod->invokeArgs(new $uriContent['namespace'], $params);
    }

    public function registry(string $uri, string $controller, string $method): void
    {
        $this->routes[$uri] = [
            'method' => $method,
            'namespace' => $controller,
        ];
    }

    private static function createReflectionMethod(array $uriContent): ReflectionMethod
    {
        try {
            return new ReflectionMethod($uriContent['namespace'], $uriContent['method']);
        } catch (ReflectionException $exception) {
            print $exception->getMessage();
        }
    }
}