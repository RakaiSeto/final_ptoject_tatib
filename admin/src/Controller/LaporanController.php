<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\kelas;
use Tatib\Src\Model\mahasiswa;

class LaporanController extends Controller
{
    public function index(){
        Helper::dumpToLog("serve laporkan");
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        $arrTI = [
            '1' => [],
            '2' => [],
            '3' => [],
            '4' => []
        ];

        $arrSIB = [
            '1' => [],
            '2' => [],
            '3' => [],
            '4' => []
        ];

        $arrPPLS = [
            '1' => [],
            '2' => []
        ];

        $kelas = new kelas();
        $result = $kelas->getKelas(null);

        foreach ($result as $key => $value) {
//            get character in position 0 of the explode
            $tingkat = substr(explode('-', $value->nama_kelas)[1], 0, 1);
            if (strpos($value->nama_kelas, 'TI') !== false) {
                $arrTI[$tingkat][] = $value;
            } elseif (strpos($value->nama_kelas, 'SIB') !== false) {
                $arrSIB[$tingkat][] = $value;
            } else {
                $arrPPLS[$tingkat][] = $value;
            }
        }

        $role = json_decode($_COOKIE['user'], true)['role'];
        $this->render( $role . '/page/laporkan', [
            'title' => 'Laporkan Pelanggaran',
            'ti' => $arrTI,
            'sib' => $arrSIB,
            'ppls' => $arrPPLS
        ]);
    }

    public function filterMahasiswa() {
//return error to ajax
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        $mahasiswa = new mahasiswa();
        $result = $mahasiswa->getMahasiswaByKelas($_POST['kelas']);

        if ($result == null) {
            http_response_code(400); // Set the HTTP error code to 400 (Bad Request)
            $error = array('message' => 'mahasiswa tidak tersedia');
            echo json_encode($error);
            return;
        } elseif (!is_array($result)) {
            http_response_code(400);
            $error = array('message' => $result);
            echo json_encode($error);
        } else {
            echo json_encode($result);
        }
    }
}