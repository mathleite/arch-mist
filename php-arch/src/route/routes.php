<?php

use Mathleite\PhpArch\api\auth\controller\AuthController;
use Mathleite\PhpArch\api\common\request\Request;
use Mathleite\PhpArch\api\healthcheck\controller\HealthCheckController;
use Mathleite\PhpArch\route\enum\RouterEnum;
use Mathleite\PhpArch\route\factory\RouterFactory;

function detectRequestBody(): bool|string {
    $rawInput = fopen('php://input', 'r');
    $tempStream = fopen('php://temp', 'r+');
    stream_copy_to_stream($rawInput, $tempStream);
    rewind($tempStream);
    return stream_get_contents($tempStream);
}

$router = RouterFactory::construct(RouterEnum::SIMPLE);

$router->registry('/health-check', HealthCheckController::class, 'index');
$router->registry('/auth/signup', AuthController::class, 'create');
$router->registry('/auth/login', AuthController::class, 'index');

if ($request = detectRequestBody()) {
    $requestData = new Request(json_decode($request, true));
}

$response = $router->dispatch($_SERVER['REQUEST_URI'], $requestData ?? null);
echo $response->respond();