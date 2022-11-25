<?php

namespace Mathleite\PhpArch\route;

use Mathleite\PhpArch\api\common\interfaces\ControllerResponseInterface;
use Mathleite\PhpArch\api\common\interfaces\RequestInterface;
use Mathleite\PhpArch\api\common\responses\JsonResponse;
use ReflectionException;
use ReflectionMethod;

class SimpleRouter implements RouterInterface
{
    private const NOT_FOUND_CODE = 404;
    private const INTERNAL_ERROR_CODE = 500;
    private array $routes = [];

    /**
     * @param string $requestAction
     * @param RequestInterface|null $request
     * @return JsonResponse
     */
    public function dispatch(string $requestAction, ?RequestInterface $request = null): ControllerResponseInterface
    {
        if (!key_exists($requestAction, $this->routes)) {
            return JsonResponse::getInstance()
                ->setData(['status' => self::NOT_FOUND_CODE, 'message' => "Invalid resource"])
                ->setStatusCode(self::NOT_FOUND_CODE);
        }

        try {
            $uriContent = $this->routes[$requestAction];
            $reflectedControllerMethod = new ReflectionMethod($uriContent['namespace'], $uriContent['method']);
            return $reflectedControllerMethod->invokeArgs(new $uriContent['namespace'], [$request]);
        } catch (ReflectionException) {
            return JsonResponse::getInstance()
                ->setData(['status' => self::INTERNAL_ERROR_CODE, 'message' => "Internal server error"])
                ->setStatusCode(self::INTERNAL_ERROR_CODE);
        }
    }

    /**
     * @param string $uri
     * @param string $controller
     * @param string $method
     * @return void
     */
    public function registry(string $uri, string $controller, string $method): void
    {
        $this->routes[$uri] = [
            'method' => $method,
            'namespace' => $controller,
        ];
    }
}