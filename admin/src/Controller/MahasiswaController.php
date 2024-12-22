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