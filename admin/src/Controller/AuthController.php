<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\mahasiswa;
use Tatib\Src\Model\pegawai;

class AuthController extends Controller
{
    public function doLogin()
    {
        Helper::dumpToLog('serve doLogin');
        Helper::dumpToLog(json_encode($_POST));

        $nim = $_POST['nip'];
        $password = $_POST['password'];

        $mahasiswa = new pegawai();
        $result = $mahasiswa->getPegawai($nim);

        if ($result == null) {
            Helper::dumpToLog("Pegawai $nim tidak ditemukan");
            session_start();
            $_SESSION['Error'] = "Pegawai $nim tidak ditemukan";
            header("Location: /");
        } else {
            if ($result[0]->password == Helper::encrypt($password)) {
                Helper::dumpToLog("success login Pegawai $nim");
                $cookieValue = [];
                $cookieValue['nip'] = $result[0]->nip;
                $cookieValue['nama_pegawai'] = $result[0]->nama_pegawai;
                $cookieValue['role'] = $result[0]->role;
                $cookieValue['email'] = $result[0]->email;
                $cookieValue['no_telp'] = $result[0]->no_telp;
                $cookieValue['prodi'] = $result[0]->prodi;
                $cookieValue['is_dpa'] = $result[0]->is_dpa;
                $cookieValue['is_kps'] = $result[0]->is_kps;

                setcookie("user", json_encode($cookieValue), time() + 86400, "/"); // 86400 = 1 day

                header("Location: /home");
            } else {
                Helper::dumpToLog("gagal login pegawai $nim");
                session_start();
                $_SESSION['Error'] = 'Password Salah';

                header("Location: /");
            }
        }
    }

    public function change(){
        Helper::dumpToLog("serve change");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $this->render('dosen/page/gantiPassword', [
            'title' => 'Ganti Password'
        ]);
    }

    public function doChangePassword()
    {
        Helper::dumpToLog('serve doChangePassword');
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        $mahasiswa = new pegawai();
        $cookieArray = json_decode($_COOKIE['user'], true);
        $result = $mahasiswa->getPegawai($cookieArray['nip']);

        if ($result == null) {
            Helper::dumpToLog("Pegawai $cookieArray[nim] tidak ditemukan");
            session_start();
            $_SESSION['Error'] = "Pegawai $cookieArray[nim] tidak ditemukan";
            header("Location: /");
        } else {
            if ($result[0]->password == Helper::encrypt($_POST['old'])) {
                $result[0]->password = Helper::encrypt($_POST['new']);
                $result[0]->updatePegawai($cookieArray['nip']);
                Helper::dumpToLog("success change password Pegawai $cookieArray[nim]");
                header("Location: /logout");
            } else {
                Helper::dumpToLog("gagal change password Pegawai $cookieArray[nim]");
                session_start();
                $_SESSION['Error'] = 'Password Lama Salah';
                header("Location: /changePassword");
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