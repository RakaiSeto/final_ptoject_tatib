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
$router->addRoute('POST', '/getDetailDosen', DosenController::class, 'getDetailDosen');
$router->addRoute('POST', '/doInsertDosen', DosenController::class, 'doInsertDosen');
$router->addRoute('POST', '/doUpdateDosen', DosenController::class, 'doUpdateDosen');
$router->addRoute('POST', '/doDeleteDosen', DosenController::class, 'doDeleteDosen');
$router->addRoute('POST', '/getKelasTanpaDPA', DosenController::class, 'getKelasTanpaDPA');

$router->addRoute('GET', '/dataMahasiswa', MahasiswaController::class, 'mahasiswa');
$router->addRoute('POST', '/getDataMahasiswa', MahasiswaController::class, 'getDataMahasiswa');
$router->addRoute('POST', '/getDetailMahasiswa', MahasiswaController::class, 'getDetailMahasiswa');
$router->addRoute('POST', '/doInsertMahasiswa', MahasiswaController::class, 'doInsertMahasiswa');
$router->addRoute('POST', '/doUpdateMahasiswa', MahasiswaController::class, 'doUpdateMahasiswa');
$router->addRoute('POST', '/doDeleteMahasiswa', MahasiswaController::class, 'doDeleteMahasiswa');

$router->addRoute('GET', '/dataAdmin', AdminController::class, 'admin');
$router->addRoute('POST', '/getDataAdmin', AdminController::class, 'getDataAdmin');
$router->addRoute('POST', '/getDetailAdmin', AdminController::class, 'getDetailAdmin');
$router->addRoute('POST', '/doInsertAdmin', AdminController::class, 'doInsertAdmin');
$router->addRoute('POST', '/doUpdateAdmin', AdminController::class, 'doUpdateAdmin');
$router->addRoute('POST', '/doDeleteAdmin', AdminController::class, 'doDeleteAdmin');

$router->addRoute('GET', '/dataPelanggaran', PelanggaranController::class, 'pelanggaran');
$router->addRoute('POST', '/getDataPelanggaran', PelanggaranController::class, 'getDataPelanggaran');
$router->addRoute('POST', '/detailPelanggaran', PelanggaranController::class, 'detailPelanggaran');

// Add a new route for serving static files
$router->addRoute('GET', '/public/[A-Za-z]+/[A-Za-z0-9\(\)-]+-[A-Za-z]+', StaticController::class, 'serveFile');

return $router;