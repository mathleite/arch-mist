<?php

use Mathleite\PhpArch\api\healthcheck\controller\HealthCheckController;
use Mathleite\PhpArch\route\enum\RouterEnum;
use Mathleite\PhpArch\route\factory\RouterFactory;

$router = RouterFactory::construct(RouterEnum::SIMPLE);

$router->registry('/health-check', HealthCheckController::class, 'index');

$response = $router->dispatch($_SERVER['REQUEST_URI']);
echo $response->respond();