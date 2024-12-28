<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\daftar_pelanggaran;
use Tatib\Src\Model\pegawai;

class InformasiController extends Controller
{
    public function informasi()
    {
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        // Ambil data pengguna dari cookie
        $role = json_decode($_COOKIE['user'], true)['role'];
        
        // Ambil daftar pelanggaran
        $model = new daftar_pelanggaran();
        $result = $model->getDaftarPelanggaran();

        // Kirim data ke tampilan
        $this->render($role . '/page/informasi', [
            'informasi' => $result,
            'title' => 'Informasi Tata Tertib'
        ]);
    }
}
