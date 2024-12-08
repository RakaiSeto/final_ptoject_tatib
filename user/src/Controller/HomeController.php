<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\mahasiswa;

class HomeController extends Controller
{
    public function index()
    {
        Helper::dumpToLog("serve index");
        if (isset($_COOKIE['user'])) {
            header("Location: /home");
            return;
        }
        $this->render('mahasiswa/page/login');
    }

    public function home()
    {
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

//        get profile data
        $cookieArray = json_decode($_COOKIE['user'], true);
        $mahasiswa = new mahasiswa();
        $result = $mahasiswa->getMahasiswa($cookieArray['nim']);
        if ($result == null) {
            session_start();
            $_SESSION['Error'] = "Mahasiswa $cookieArray[nim] tidak ditemukan";
            header("Location: /");
            return;
        }

        if (!Helper::checkFileExist($result[0]->foto_mahasiswa)) {
            $result[0]->foto_mahasiswa = "/public/img/default-pp.png";
        }
        $result[0]->foto_mahasiswa = Helper::lastFullstopToHyphen($result[0]->foto_mahasiswa);

//        sek onk pelanggaran a?
        $db = new Db();
        $dbConn = $db->getInstance();
        $query = "SELECT count(*) FROM data_pelanggaran WHERE nim_terlapor = ? and is_done = 0";
        $stmt = $dbConn->prepare($query);
        $stmt->execute([$cookieArray['nim']]);
        $jumlah_pelanggaran = $stmt->fetchColumn();

        $this->render('mahasiswa/page/dashboard', [
            'profile' => $result[0],
            'jumlah_pelanggaran' => $jumlah_pelanggaran,
            'title' => 'Dashboard'
        ]);
    }

    public function informasi(){
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $this->render('mahasiswa/page/informasi', [
            'title' => 'Informasi'
        ]);
    }

    public function dataPelanggaran(){
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $this->render('mahasiswa/page/dataPelanggaran', [
            'title' => 'Data Pelanggaran'
        ]);
    }

    public function cetakSurat(){
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $this->render('mahasiswa/page/cetakSurat', [
            'title' => 'Cetak Surat'
        ]);
    }

    public function gantiPassword(){
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $this->render('mahasiswa/page/gantiPassword', [
            'title' => 'Ganti Password'
        ]);
    }
}