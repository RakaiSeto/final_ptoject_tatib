<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\pegawai;

class DosenController extends Controller
{
    public function dataDosen()
    {
        Helper::dumpToLog("serve dosen");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        // Memanggil model kelas untuk mengambil data kelas
        $model = new pegawai();
        $result = $model->getPegawai(null);  // null berarti ambil semua kelas

        // Mendapatkan role pengguna dari cookie
        $role = json_decode($_COOKIE['user'], true)['role'];

        // Render halaman daftar kelas berdasarkan role pengguna
        $this->render($role . '/page/dataDosen', ['dosenList' => $result, 'title' => 'Data Dosen']);
    }
}

?>