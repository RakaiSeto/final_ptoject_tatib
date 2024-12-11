<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\data_pelanggaran;

class DataPelanggaranController extends Controller
{
    public function dataPelanggaran()
    {
        Helper::dumpToLog("serve data pelanggaran");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        // Memanggil model kelas untuk mengambil data kelas
        $model = new data_pelanggaran();
        $result = $model->getDataPelanggaran(null);  // null berarti ambil semua kelas

        // Mendapatkan role pengguna dari cookie
        $role = json_decode($_COOKIE['user'], true)['role'];

        // Render halaman daftar kelas berdasarkan role pengguna
        $this->render($role . '/page/pelanggaranMahasiswa', ['pelanggaranList' => $result, 'title' => 'Data Pelanggaran Mahasiswa']);
    }
}

?>