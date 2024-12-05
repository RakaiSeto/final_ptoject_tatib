<?php

require 'vendor/autoload.php';

$env = parse_ini_file(__DIR__ . '/.env');
define('BASE_URL', $env['BASE_URL']);

$uri = $_SERVER['REQUEST_URI'];

$router = require 'src/routes.php';
$router->dispatch($uri);
