<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\mahasiswa;
use Tatib\Src\Model\daftar_pelanggaran;

class HomeController extends Controller
{
    public function index()
    {
        Helper::dumpToLog("serve index");
        if (isset($_COOKIE['user'])) {
            header("Location: /home");
            return;
        }
        $this->render('dosen/page/login');
    }

    public function home()
    {
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
//
//        $cookieArray = json_decode($_COOKIE['user'], true);
//        $mahasiswa = new mahasiswa();
//        $result = $mahasiswa->getMahasiswa($cookieArray['nim']);
//        if ($result == null) {
//            session_start();
//            $_SESSION['Error'] = "Mahasiswa $cookieArray[nim] tidak ditemukan";
//            header("Location: /");
//            return;
//        }
//
//        if (!Helper::checkFileExist($result[0]->foto_mahasiswa)) {
//            $result[0]->foto_mahasiswa = "/public/img/default-pp.png";
//        }
//        $result[0]->foto_mahasiswa = Helper::lastFullstopToHyphen($result[0]->foto_mahasiswa);

        $this->render('/dosen/page/dashboard', [
//            'profile' => $result[0],
            'title' => 'Dashboard'
        ]);
    }

    public function informasi(){
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $this->render('dosen/page/informasi', [
            'title' => 'Informasi Tata Tertib'
        ]);
    }

    public function laporkan(){
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $this->render('dosen/page/laporkan', [
            'title' => 'Laporkan Pelanggaran'
        ]);
    }

    public function riwayatPelaporan(){
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $this->render('dosen/page/riwayatPelaporan', [
            'title' => 'Riwayat Pelaporan'  
        ]);
    }

    public function dataPelanggaran(){
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $this->render('dosen/page/dataPelanggaran', [
            'title' => 'Data Pelanggaran'  
        ]);
    }

    public function gantiPassword(){
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $this->render('dosen/page/gantiPassword', [
            'title' => 'Ganti Password'  
        ]);
    }
    
}