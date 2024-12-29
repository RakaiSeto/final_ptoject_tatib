<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Helper;
use Tatib\Src\Model\banding;
use Tatib\Src\Model\data_pelanggaran;
use Tatib\Src\Model\sanksi;

class PelanggaranController extends Controller
{
    public function index()
    {
        Helper::dumpToLog("serve index data pelangaran");
        if (!isset($_COOKIE['user'])) {
            header("Location: /login");
            return;
        }

        $cookieArray = json_decode($_COOKIE['user'], true);
        $pelanggaran = new data_pelanggaran();
        $data = $pelanggaran->getByNimTerlapor($cookieArray['nim']);
        if ($data instanceof string) {
            Helper::dumpToLog("gagal get data pelanggaran: " . $data);
            session_start();
            $_SESSION['error'] = $data;
            header("Location: /home");
            return;
        }

        // echo json_encode($data);

        $this->render('mahasiswa/page/dataPelanggaran', [
            'title' => 'Data Pelanggaran',
            'data' => $data
        ]);
    }

    public function detailPelanggaran()
    {
        $out = [];
        $pelanggaran = new data_pelanggaran();
        $data = $pelanggaran->getDataPelanggaran($_POST['kode_pelanggaran']);
        if ($data instanceof string) {
            session_start();
            $_SESSION['error'] = $data;
            header("Location: /home");
            return;
        }

        foreach ($data as $key => $value) {
            $value->tautan_bukti = Helper::checkFileExist($value->tautan_bukti) ? $value->tautan_bukti : '-';
        }
        $banding = new banding();
        $dataBanding = $banding->getBanding('BNG-' . $_POST['kode_pelanggaran']);
        if ($dataBanding instanceof string) {
            session_start();
            $_SESSION['error'] = $dataBanding;
            header("Location: /home");
            return;
        }

        $sanksi = new sanksi();
        $dataSanksi = $sanksi->getSanksi('SNK-' . $_POST['kode_pelanggaran']);
        if ($dataSanksi instanceof string) {
            session_start();
            $_SESSION['error'] = $dataSanksi;
            header("Location: /home");
            return;
        }

        $out['data'] = $data[0];
        $out['banding'] = $dataBanding[0] ?? null;
        $out['sanksi'] = $dataSanksi[0] ?? null;
        echo json_encode($out);
    }

    public function ajuBanding()
    {
        $pelanggaran = new data_pelanggaran();
        $resultPelanggaran = $pelanggaran->getDataPelanggaran($_POST['kode_pelanggaran']);
        if ($resultPelanggaran instanceof string) {
            session_start();
            $_SESSION['error'] = $resultPelanggaran;
            header("Location: /home");
            return;
        }

        $resultPelanggaran[0]->is_banding = 1;
        $resultPelanggaran[0]->is_verified = 0;
        $resultPelanggaran[0]->updateDataPelanggaran($_POST['kode_pelanggaran']);

        $tautanBanding = null;
        if (isset($_FILES['foto'])) {
            $fileExtension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

            // Get the temporary file path
            $tmpFilePath = $_FILES['foto']['tmp_name'];

            // Store the file in a directory
            $uploadDir = __DIR__ . '/../../../public/bukti/';
            $uploadFilePath = $uploadDir . 'BNG-' . $_POST['kode_pelanggaran'] . '.' . $fileExtension;

            // Move the file from the temporary path to the upload directory
            if (move_uploaded_file($tmpFilePath, $uploadFilePath)) {
                $tautanBanding = $uploadFilePath;
            }
        }

        $banding = new banding();
        $banding->id_banding = 'BNG-' . $_POST['kode_pelanggaran'];
        $banding->tautan_banding = $tautanBanding;
        $banding->is_accepted = 0;
        $banding->datetime = date('Y-m-d H:i:s');
        $banding->deskripsi = $_POST['tanggapan'];
        $banding->insertBanding();
    }
}
