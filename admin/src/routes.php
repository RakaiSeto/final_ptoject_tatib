<?php
// user/src/routes.php

use Tatib\Src\Controller\AuthController;
use Tatib\Src\Controller\HomeController;
use Tatib\Src\Controller\LaporanController;
use Tatib\Src\Controller\PelanggaranController;
use Tatib\Src\Controller\StaticController;
use Tatib\Src\Controller\InformasiController;
use Tatib\Src\Controller\KelasController;
use Tatib\Src\Controller\MahasiswaController;
use Tatib\Src\Controller\DosenController;
// use Tatib\Src\Controller\PelanggaranController;
use Tatib\Src\Router;

$router = new Router();


$router->addRoute('GET', '/', HomeController::class, 'index');
$router->addRoute('POST', '/doLogin', AuthController::class, 'doLogin');
$router->addRoute('GET', '/gantiPassword', AuthController::class, 'change');
$router->addRoute('POST', '/doChangePassword', AuthController::class, 'doChangePassword');
$router->addRoute('GET', '/logout', AuthController::class, 'logout');

$router->addRoute('GET', '/home', HomeController::class, 'home');
$router->addRoute('GET', '/informasi', InformasiController::class, 'informasi');
$router->addRoute('GET', '/laporkan', LaporanController::class, 'index');
$router->addRoute('POST', '/getMahasiswaKelas', LaporanController::class, 'filterMahasiswa');
$router->addRoute('POST', '/doLaporkan', LaporanController::class, 'doLaporkan');
$router->addRoute('GET', '/riwayatPelaporan', HomeController::class, 'riwayatPelaporan');

$router->addRoute('GET', '/dataPelanggaran', HomeController::class, 'dataPelanggaran');
$router->addRoute('POST', '/getDataPelanggaran', LaporanController::class, 'getDataPelanggaran');

$router->addRoute('POST', '/kelas/tambah', KelasController::class, 'tambahKelas');
$router->addRoute('GET', '/kelas/delete', KelasController::class, 'deleteKelas');

// $router->addRoute('POST', '/mahasiswa/tambah', MahasiswaController::class, 'tambahMahasiswa');
// $router->addRoute('POST', '/mahasiswa/delete', MahasiswaController::class, 'deleteMahasiswa');

$router->addRoute('POST', '/dosen/tambah', DosenController::class, 'tambahDosen');

$router->addRoute('GET', '/dataDosen', HomeController::class, 'dataDosen');
$router->addRoute('GET', '/dataDosen', DosenController::class, 'dataDosen');
// $router->addRoute('GET', '/mahasiswa', MahasiswaController::class, 'mahasiswa');
$router->addRoute('GET', '/dataKelas', KelasController::class, 'daftarKelas');


$router->addRoute('GET', '/pelanggaranMahasiswa', PelanggaranController::class, 'pelanggaran');
// $router->addRoute('POST', '/getDataPelanggaran', PelanggaranController::class, 'getDataPelanggaran');
$router->addRoute('POST', '/detailPelanggaran', PelanggaranController::class, 'detailPelanggaran');


$router->addRoute('GET', '/mahasiswa', MahasiswaController::class, 'mahasiswa');
$router->addRoute('POST', '/getDataMahasiswa', MahasiswaController::class, 'getDataMahasiswa');
$router->addRoute('POST', '/getDetailMahasiswa', MahasiswaController::class, 'getDetailMahasiswa');
$router->addRoute('POST', '/doInsertMahasiswa', MahasiswaController::class, 'doInsertMahasiswa');
$router->addRoute('POST', '/doUpdateMahasiswa', MahasiswaController::class, 'doUpdateMahasiswa');
$router->addRoute('POST', '/doDeleteMahasiswa', MahasiswaController::class, 'doDeleteMahasiswa');

// Add a new route for serving static files
$router->addRoute('GET', '/public/[A-Za-z]+/[A-Za-z0-9\(\)-]+-[A-Za-z]+', StaticController::class, 'serveFile');

return $router;