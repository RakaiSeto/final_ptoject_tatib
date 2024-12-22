<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\mahasiswa;

class MahasiswaController extends Controller
{
    public function dataMahasiswa()
    {
        Helper::dumpToLog("serve mahasiswa");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        // Memanggil model kelas untuk mengambil data kelas
        $model = new mahasiswa();
        $result = $model->getMahasiswa(null);  // null berarti ambil semua kelas

        // Mendapatkan role pengguna dari cookie
        $role = json_decode($_COOKIE['user'], true)['role'];

        // Render halaman daftar kelas berdasarkan role pengguna
        $this->render($role . '/page/dataMahasiswa', ['mahasiswaList' => $result, 'title' => 'Data Mahasiswa']);
    }
}

?>