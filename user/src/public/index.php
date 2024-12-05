<?php
require '../../vendor/autoload.php';

$router = require '../routes.php';
$router->dispatch($_SERVER['REQUEST_URI']);