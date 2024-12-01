<?php

use Tatib\Src\Controller\PegawaiController;
use Tatib\Src\Router;

$router = new Router();

$router->addRoute('/', PegawaiController::class, 'index');
$router->addRoute('/get', PegawaiController::class, 'get');

return $router;