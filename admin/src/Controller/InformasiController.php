<?php
namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\daftar_pelanggaran;
use Tatib\Src\Model\pegawai;

class InformasiController extends Controller
{
    public function informasi(){
        Helper::dumpToLog("serve home");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        // Ambil data pengguna dari cookie
        $user = json_decode($_COOKIE['user'], true);
        $nip = $user['nip']; // Ambil NIP dari cookie
        $namaPegawai = \Tatib\Src\Model\pegawai::getNamaPegawaiByNIP($nip); // Ambil nama pegawai berdasarkan NIP
        $role = $user['role']; // Ambil role dari cookie

        // Ambil daftar pelanggaran
        $model = new daftar_pelanggaran();
        $result = $model->getDaftarPelanggaran();

        // Kirim data ke tampilan
        $this->render($role . '/page/informasi', [
            'informasi' => $result,
            'title' => 'Informasi Tata Tertib',
            'namaPegawai' => $namaPegawai, // Kirim nama pegawai ke view
            'role' => $role // Kirim role ke view
        ]);
    }
}