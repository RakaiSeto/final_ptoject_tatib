<?php

use Tatib\Src\Controller\PegawaiController;
use Tatib\Src\Router;

$router = new Router();

$router->addRoute('/', PegawaiController::class, 'index');

return $router;