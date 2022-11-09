<?php

$router = \Mathleite\PhpArch\route\factory\RouterFactory::construct(\Mathleite\PhpArch\route\enum\RouterEnum::SIMPLE);

$router->registry('/health-check', \Mathleite\PhpArch\api\healthcheck\controller\HealthCheckController::class, 'index');
$response = $router->dispatch($_SERVER['REQUEST_URI']);
echo $response->respond();