<?php
// user/src/routes.php

use Tatib\Src\Controller\HomeController;
use Tatib\Src\Controller\PegawaiController;
use Tatib\Src\Controller\StaticController;
use Tatib\Src\Router;

$router = new Router();

$router->addRoute('/', HomeController::class, 'index');
$router->addRoute('/home', HomeController::class, 'home');

// Add a new route for serving static files
$router->addRoute('/public/[A-Za-z]+/[A-Za-z0-9-]+-[A-Za-z]+', StaticController::class, 'serveFile');

return $router;