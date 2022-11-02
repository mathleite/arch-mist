<?php

$router = new \Mathleite\PhpArch\route\SimpleRouter();

$router->registry('/health-check', \Mathleite\PhpArch\api\healthcheck\controller\HealthCheckController::class, 'index');
$response = $router->dispatch($_SERVER['REQUEST_URI']);
echo $response->respond();