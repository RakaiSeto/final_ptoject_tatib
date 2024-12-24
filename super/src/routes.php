<?php
// user/src/routes.php

use Tatib\Src\Controller\AuthController;
use Tatib\Src\Controller\HomeController;
use Tatib\Src\Controller\StaticController;
use Tatib\Src\Controller\InformasiController;
use Tatib\Src\Controller\DosenController;
use Tatib\Src\Controller\MahasiswaController;
use Tatib\Src\Controller\AdminController;
use Tatib\Src\Controller\PelanggaranController;
use Tatib\Src\Router;

$router = new Router();

$router->addRoute('GET', '/', HomeController::class, 'index');
$router->addRoute('GET', '/home', HomeController::class, 'home');
$router->addRoute('POST', '/doLogin', AuthController::class, 'doLogin');
$router->addRoute('GET', '/logout', AuthController::class, 'logout');
$router->addRoute('GET', '/change-password', AuthController::class, 'changePassword');
$router->addRoute('POST', '/doChangePassword', AuthController::class, 'doChangePassword');

$router->addRoute('GET', '/informasi', InformasiController::class, 'informasi');

$router->addRoute('GET', '/dataDosen', DosenController::class, 'dosen');
$router->addRoute('POST', '/getDataDosen', DosenController::class, 'getDataDosen');

$router->addRoute('GET', '/dataMahasiswa', MahasiswaController::class, 'mahasiswa');
$router->addRoute('POST', '/getDataMahasiswa', MahasiswaController::class, 'getDataMahasiswa');

$router->addRoute('GET', '/dataAdmin', AdminController::class, 'admin');
$router->addRoute('POST', '/getDataAdmin', AdminController::class, 'getDataAdmin');

$router->addRoute('GET', '/dataPelanggaran', PelanggaranController::class, 'pelanggaran');
$router->addRoute('POST', '/getDataPelanggaran', PelanggaranController::class, 'getDataPelanggaran');
$router->addRoute('POST', '/detailPelanggaran', PelanggaranController::class, 'detailPelanggaran');

// Add a new route for serving static files
$router->addRoute('GET', '/public/[A-Za-z]+/[A-Za-z0-9\(\)-]+-[A-Za-z]+', StaticController::class, 'serveFile');

return $router;