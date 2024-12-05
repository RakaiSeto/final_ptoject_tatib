<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
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

        $this->render('mahasiswa/page/dashboard', ['profile' => $result[0]]);
    }
}