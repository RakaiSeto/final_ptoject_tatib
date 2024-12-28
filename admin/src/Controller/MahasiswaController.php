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

    // Cek apakah cookie 'user' ada
    if (!isset($_COOKIE['user'])) {
        header("Location: /");
        return;
    }

    // Mengambil data pengguna dari cookie
    $user = json_decode($_COOKIE['user'], true);
    $role = $user['role'] ?? null;
    $nip = $user['nip']; // Ambil NIP dari cookie untuk mendapatkan nama pegawai
    $namaPegawai = \Tatib\Src\Model\pegawai::getNamaPegawaiByNIP($nip); // Ambil nama pegawai berdasarkan NIP

    // Memanggil model mahasiswa untuk mengambil data mahasiswa
    $model = new mahasiswa();
    $result = $model->getMahasiswa(null);  // null berarti ambil semua mahasiswa

    // Render halaman data mahasiswa berdasarkan role pengguna
    $this->render($role . '/page/dataMahasiswa', [
        'mahasiswaList' => $result, 
        'title' => 'Data Mahasiswa',
        'namaPegawai' => $namaPegawai,  // Kirim nama pegawai ke view
        'role' => $role  // Kirim role pengguna ke view
    ]);
}

    public function deleteMahasiswa()
{
    // Validasi metode HTTP
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo "Method Not Allowed";
        return;
    }

    // Ambil parameter NIM dari request
    $nim = $_POST['nim'] ?? null;

    if (!$nim) {
        Helper::dumpToLog("Parameter NIM tidak ditemukan.");
        header("Location: /mahasiswa");
        exit;
    }

    Helper::dumpToLog("Parameter NIM yang diterima: " . $nim);

    // Memanggil model untuk menghapus data mahasiswa
    $model = new mahasiswa();
    $result = $model->deleteMahasiswa($nim);

    if ($result === true) {
        Helper::dumpToLog("Mahasiswa dengan NIM $nim berhasil dihapus.");
    } else {
        Helper::dumpToLog("Gagal menghapus mahasiswa dengan NIM $nim.");
    }

    // Redirect kembali ke halaman mahasiswa
    header("Location: /mahasiswa");
    exit;
}

}


?>