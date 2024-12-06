<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\mahasiswa;

class AuthController extends Controller
{
    public function doLogin()
    {
        Helper::dumpToLog('serve doLogin');
        Helper::dumpToLog(json_encode($_POST));
        $db = new Db();
        $dbConn = $db->getInstance();

        $nim = $_POST['nim'];
        $password = $_POST['password'];

        $mahasiswa = new mahasiswa();
        $result = $mahasiswa->getMahasiswa($nim);

        if ($result == null) {
            Helper::dumpToLog("mahasiswa $nim tidak ditemukan");
            session_start();
            $_SESSION['Error'] = "Mahasiswa $nim tidak ditemukan";
            header("Location: /");
        } else {
            if ($result[0]->password == Helper::encrypt($password)) {
                Helper::dumpToLog("success login mahasiswa $nim");
                $cookieValue = [];
                $cookieValue['nim'] = $result[0]->nim;
                $cookieValue['nama_mahasiswa'] = $result[0]->nama_mahasiswa;
                $cookieValue['no_telp'] = $result[0]->no_telp;
                $cookieValue['email'] = $result[0]->email;
                $cookieValue['id_kelas'] = $result[0]->id_kelas;
                $cookieValue['secret'] = $result[0]->secret;
                $cookieValue['is_active'] = $result[0]->is_active;
                $cookieValue['fotomahasiswa'] = $result[0]->foto_mahasiswa;
                $cookieValue['tanggal_lahir'] = $result[0]->tanggal_lahir;
                $cookieValue['jenis_kelamin'] = $result[0]->jenis_kelamin;
                $cookieValue['id_prodi'] = $result[0]->id_prodi;;

                setcookie("user", json_encode($cookieValue), time() + (86400 * 30), "/"); // 86400 = 1 day

                header("Location: /home");
            } else {
                Helper::dumpToLog("gagal login mahasiswa $nim");
                session_start();
                $_SESSION['Error'] = 'Password Salah';

                header("Location: /");
            }
        }

    }

    public function logout()
    {
        session_start();
        session_destroy();
        setcookie("user", "", time() - 3600, "/"); // 86400 = 1 day
        header("Location: /");
    }
}