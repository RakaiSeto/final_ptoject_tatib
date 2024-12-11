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

    // Jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil data dari form
        $id_kelas = $_POST['id_kelas'];
        $nama_kelas = $_POST['nama_kelas'];
        $nip_dpa = $_POST['nip_dpa'];

        // Membuat objek kelas
        $kelas = new kelas();
        $kelas->id_kelas = $id_kelas;
        $kelas->nama_kelas = $nama_kelas;
        $kelas->nip_dpa = $nip_dpa;

        // Menyimpan data kelas ke database
        $result = $kelas->insertKelas();

        if ($result === true) {
            // Redirect atau tampilkan pesan sukses
            Helper::dumpToLog("Kelas berhasil ditambahkan");
            header("Location: /kelas"); // Redirect ke halaman daftar kelas
            exit;
        } else {
            // Tampilkan pesan error
            Helper::dumpToLog("Gagal menambahkan kelas: $result");
        }
    }

    // Render halaman tambah kelas berdasarkan role pengguna
    $this->render($role . '/page/dataKelas', ['title' => 'Tambah Kelas']);
}

    

}