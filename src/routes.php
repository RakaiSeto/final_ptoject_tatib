<?php

use Tatib\Src\Controller\TestController;
use Tatib\Src\Router;

$router = new Router();

$router->addRoute('/', TestController::class, 'index');

return $router;