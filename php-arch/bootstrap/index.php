<?php

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

require_once __DIR__ . '/../src/route/routes.php';