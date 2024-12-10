<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\kelas;

class KelasController extends Controller
{
    public function daftarKelas()
    {
        Helper::dumpToLog("serve kelas");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        // Memanggil model kelas untuk mengambil data kelas
        $model = new kelas();
        $result = $model->getKelas(null);  // null berarti ambil semua kelas

        // Mendapatkan role pengguna dari cookie
        $role = json_decode($_COOKIE['user'], true)['role'];

        // Render halaman daftar kelas berdasarkan role pengguna
        $this->render($role . '/page/dataKelas', ['kelasList' => $result, 'title' => 'Data Kelas']);
    }

    public function tambahKelas()
    {
    Helper::dumpToLog("serve tambah kelas");
    
    // Cek apakah pengguna sudah login
    if (!isset($_COOKIE['user'])) {
        header("Location: /");
        return;
    }

    // Mendapatkan role pengguna dari cookie
    $role = json_decode($_COOKIE['user'], true)['role'];

    // Render halaman tambah kelas berdasarkan role pengguna
    // Pastikan file tambahKelas.php berisi form untuk menambah kelas
    $this->render($role . '/page/tambahKelas', ['title' => 'Tambah Kelas']);
    }

    

}