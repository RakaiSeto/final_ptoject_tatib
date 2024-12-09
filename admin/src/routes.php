<?php
// user/src/routes.php

use Tatib\Src\Controller\AuthController;
use Tatib\Src\Controller\HomeController;
use Tatib\Src\Controller\PelanggaranController;
use Tatib\Src\Controller\StaticController;
use Tatib\Src\Controller\InformasiController;
use Tatib\Src\Router;

$router = new Router();


$router->addRoute('GET', '/', HomeController::class, 'index');
$router->addRoute('POST', '/doLogin', AuthController::class, 'doLogin');
$router->addRoute('GET', '/logout', AuthController::class, 'logout');

$router->addRoute('GET', '/home', HomeController::class, 'home');
$router->addRoute('GET', '/informasi', HomeController::class, 'informasi');
$router->addRoute('GET', '/laporkan', HomeController::class, 'laporkan');
$router->addRoute('GET', '/riwayatPelaporan', HomeController::class, 'riwayatPelaporan');
$router->addRoute('GET', '/dataPelanggaran', HomeController::class, 'dataPelanggaran');
$router->addRoute('GET', '/gantiPassword', HomeController::class, 'gantiPassword');


// Add a new route for serving static files
$router->addRoute('GET', '/public/[A-Za-z]+/[A-Za-z0-9\(\)-]+-[A-Za-z]+', StaticController::class, 'serveFile');

return $router;