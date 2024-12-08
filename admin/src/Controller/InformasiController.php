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
        $model = new daftar_pelanggaran();
        $result = $model->getDaftarPelanggaran();
        $this->render('dosen/page/informasi', ['informasi' => $result, 'title' => 'Informasi']);
    }
    // public function tampilkanDaftarPelanggaran(){
    //     Helper::dumpToLog("serve home");
    //     if (!isset($_COOKIE['user'])) {
    //         header("Location: /");
    //         return;
    //     }
    //     $model = new daftar_pelanggaran();
    //     $result = $model->getDaftarPelanggaran();
    //     $this->render('dosen/page/informasi', ['dataPelanggaran' => $result, 'title' => 'Daftar Pelanggaran']);
    // }
    

    
}