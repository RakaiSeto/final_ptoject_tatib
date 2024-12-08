<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\data_pelanggaran;

class PelanggaranController extends Controller
{
    public function index(){
        Helper::dumpToLog("serve index data pelangaran");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        $cookieArray = json_decode($_COOKIE['user'], true);
        $pelanggaran = new data_pelanggaran();
        $data = $pelanggaran->getByNimTerlapor($cookieArray['nim']);

        $this->render('mahasiswa/page/dataPelanggaran', [
            'title' => 'Data Pelanggaran',
            'data' => $data
        ]);
    }
}