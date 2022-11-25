<?php

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->safeLoad();

require_once __DIR__ . '/../src/route/routes.php';