<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\daftar_pelanggaran;
use Tatib\Src\Model\data_pelanggaran;
use Tatib\Src\Model\kelas;
use Tatib\Src\Model\mahasiswa;

class LaporanController extends Controller
{
    public function index()
    {
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

        $arrPeraturan = [
            '1' => [],
            '2' => [],
            '3' => [],
            '4' => [],
            '5' => []
        ];
        $daftar_pelanggaran = new daftar_pelanggaran();
        $result = $daftar_pelanggaran->getDaftarPelanggaran(null);

        foreach ($result as $key => $value) {
            $arrPeraturan[$value->tingkat_pelanggaran][] = $value;
        }

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
        $this->render($role . '/page/laporkan', [
            'title' => 'Laporkan Pelanggaran',
            'ti' => $arrTI,
            'sib' => $arrSIB,
            'ppls' => $arrPPLS,
            'peraturan' => $arrPeraturan
        ]);
    }

    public function filterMahasiswa()
    {
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


    public function doLaporkan()
    {
        Helper::dumpToLog(json_encode($_POST));
        $kode_pelanggaran = 'PEL' . date('dmy') . '-' . Helper::randomAlphaNum();
        $date = $_POST['date'];
        $nim = $_POST['nim'];
        $jenisPelanggaran = $_POST['pelanggaran'];
        $kronologi = $_POST['kronologi'];
        $nip = json_decode($_COOKIE['user'], true)['nip'];

        $fileName = $kode_pelanggaran . '-BUKTI';
        $fileExtension = pathinfo($_FILES['bukti']['name'], PATHINFO_EXTENSION);

        // Get the temporary file path
        $tmpFilePath = $_FILES['bukti']['tmp_name'];

        // Store the file in a directory
        $uploadDir = __DIR__ . '/../../../public/bukti/';
        $uploadFilePath = $uploadDir . $fileName . '.' . $fileExtension;

        // Move the file from the temporary path to the upload directory
        if (move_uploaded_file($tmpFilePath, $uploadFilePath)) {
            $data_pelanggaran = new data_pelanggaran();
            $data_pelanggaran->kode_pelanggaran = $kode_pelanggaran;
            $data_pelanggaran->datetime = $date;
            $data_pelanggaran->nim_terlapor = $nim;
            $data_pelanggaran->jenis_pelanggaran = $jenisPelanggaran;
            $data_pelanggaran->kronologi = $kronologi;
            $data_pelanggaran->nip_pelapor = $nip;
            $data_pelanggaran->is_verified = 0;
            $data_pelanggaran->is_banding = 0;
            $data_pelanggaran->is_done = 0;
            $data_pelanggaran->tautan_bukti = '/public/img/' . $fileName . '.' . $fileExtension;
            $saveResult = $data_pelanggaran->insertDataPelanggaran();

            if ($saveResult == true) {
                Helper::dumpToLog("Berhasil melaporkan $nim");
                echo "Berhasil melaporkan";
            } else {
                Helper::dumpToLog("Gagal melaporkan $nim: " . $saveResult);
                http_response_code(400);
                echo $saveResult;
            }
        } else {
            Helper::dumpToLog("Gagal Melaporkan $nim, gagal upload file");
            echo "Error uploading file!";
        }
    }

    public function getDataPelanggaran()
    {
        $role = Helper::getRole();
        $keyword = '';
        if (json_decode($_COOKIE['user'])->is_dpa == 'true') {
            $kelas = new kelas();
            $result = $kelas->getKelasByDpa(json_decode($_COOKIE['user'])->nip);
            $keyword = $result[0]->id_kelas;
        } else if (json_decode($_COOKIE['user'])->is_kps == 'true' || json_decode($_COOKIE['user'])->is_admin == 'true') {
            $keyword = json_decode($_COOKIE['user'])->prodi;
        }

        $model = new data_pelanggaran();
        $result = $model->getDataPelanggaranByRole(
            $role,
            $keyword,
            $_POST['verify'] ?? 'false'
        );
        echo json_encode($result);
    }
}
