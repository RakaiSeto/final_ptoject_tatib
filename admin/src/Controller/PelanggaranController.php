<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Model\banding;
use Tatib\Src\Model\data_pelanggaran;
use Tatib\Src\Model\sanksi;

class PelanggaranController extends Controller
{
    public function pelanggaran()
    {
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }

        // Ambil data pengguna dari cookie
        $role = json_decode($_COOKIE['user'], true)['role'];

        // Pastikan role adalah 'dosen' atau 'admin'
        if (!in_array(strtolower($role), ['dosen', 'admin'])) {
            header("Location: /");
            return;
        }

        // Ambil data pelanggaran
        $pelanggaran = new data_pelanggaran();
        $data = $pelanggaran->getDataPelanggaran();

        // Kirim data ke tampilan
        $this->render($role . '/page/pelanggaranMahasiswa', [
            'title' => 'Data Pelanggaran',
            'data' => $data
        ]);
    }



    public function getPelanggaranMahasiswa()
    {
        $pelanggaran = new data_pelanggaran();

        $kategori = $_POST['kategori'] ?? null;
        $value = $_POST['value'] ?? null;
        $tanggal_mulai = $_POST['tanggal_mulai'] ?? null;
        $tanggal_akhir = $_POST['tanggal_akhir'] ?? null;

        $data = $pelanggaran->getDataPelanggaran(kode_pelanggaran: null, kategori: $kategori, value: $value, tanggal_mulai: $tanggal_mulai, tanggal_akhir: $tanggal_akhir);
        if ($data == null) {
            echo json_encode([]);
            return;
        }
        if ($data == null || $data == false) {
            echo json_encode([]);
            return;
        }
        foreach ($data as $row) {
            $row->tautan_bukti = $row->tautan_bukti == '-' ? '<button class="btn-bukti btn btn-danger" disabled>Bukti</button>' : '<button class="btn-bukti btn btn-warning" data-bs-toggle="modal" data-bs-target="#buktiModal" data-url="' . $row->tautan_bukti . '">Bukti</button>';
            $row->detail = '<button class="btn-detail btn btn-primary" data-kode="' . $row->kode_pelanggaran . '">Detail</button>';
            $row->datetime = date('d-m-Y', strtotime($row->datetime));

            if ($row->is_done == 1) {
                $row->status = '<span class="badge bg-success">Selesai</span>';
            } else if ($row->is_verified == 1) {
                $row->status = '<span class="badge bg-warning">Menunggu Sanksi</span>';
            } else if ($row->is_verified == 0 && $row->is_banding == 1) {
                $row->status = '<span class="badge bg-warning">Menunggu Banding</span>';
            } else if ($row->is_verified == 0 && $row->is_banding == 0) {
                $row->status = '<span class="badge bg-danger">Belum di Verifikasi</span>';
            }
        }
        echo json_encode($data);
    }

    public function detailPelanggaran()
    {
        $pelanggaran = new data_pelanggaran();
        $data = $pelanggaran->getDataPelanggaran($_POST['kode_pelanggaran']);
        foreach ($data as $row) {
            $row->datetime = date('d-m-Y', strtotime($row->datetime));

            if ($row->is_done == 1) {
                $row->status = '<span class="badge bg-success mt-2">Selesai</span>';
            } else if ($row->is_verified == 1) {
                $row->status = '<span class="badge bg-warning mt-2">Menunggu Sanksi</span>';
            } else if ($row->is_verified == 0 && $row->is_banding == 1) {
                $row->status = '<span class="badge bg-warning mt-2">Menunggu Banding</span>';
            } else if ($row->is_verified == 0 && $row->is_banding == 0) {
                $row->status = '<span class="badge bg-danger mt-2">Belum di Verifikasi</span>';
            }
        }
        echo json_encode($data);
    }

    public function detailDone()
    {
        $out = [];

        $pelanggaran = new data_pelanggaran();
        $data = $pelanggaran->getDataPelanggaran($_POST['kode_pelanggaran']);
        foreach ($data as $row) {
            $row->datetime = date('d-m-Y', strtotime($row->datetime));

            if ($row->is_done == 1) {
                $row->status = '<span class="badge bg-success mt-2">Selesai</span>';
            } else if ($row->is_verified == 1) {
                $row->status = '<span class="badge bg-warning mt-2">Menunggu Sanksi</span>';
            } else if ($row->is_verified == 0 && $row->is_banding == 1) {
                $row->status = '<span class="badge bg-warning mt-2">Menunggu Banding</span>';
            } else if ($row->is_verified == 0 && $row->is_banding == 0) {
                $row->status = '<span class="badge bg-danger mt-2">Belum di Verifikasi</span>';
            }
        }

        $out['pelanggaran'] = $data[0];

        $sanksi = new sanksi();
        $result = $sanksi->getSanksi('SNK-' . $_POST['kode_pelanggaran']);
        if ($result == null) {
            $out['sanksi'] = null;
        } else {
            $out['sanksi'] = $result[0];
        }

        $banding = new banding();
        $result = $banding->getBanding('BNG-' . $_POST['kode_pelanggaran']);
        if ($result == null) {
            $out['banding'] = null;
        } else {
            $out['banding'] = $result[0];
        }

        echo json_encode($out);
    }

    public function doVerifikasi()
    {
        $sanksi = new sanksi();
        $sanksi->id_sanksi = $_POST['kode_pelanggaran'];
        $sanksi->kode_pelanggaran = $_POST['kode_pelanggaran'];
        $sanksi->nama_sanksi = $_POST['sanksi'];
        $sanksi->tautan_sanksi = null;
        $sanksi->is_done = 0;
        $sanksi->datetime = date('Y-m-d');
        $sanksi->deskripsi = $_POST['deskripsi'];
        $sanksi->insertSanksi();
        
        $pelanggaran = new data_pelanggaran();
        $data = $pelanggaran->getDetailPelanggaran($_POST['kode_pelanggaran']);
        $data[0]->is_verified = 1;
        $data[0]->updateDataPelanggaran($_POST['kode_pelanggaran']);

        echo "success";
    }

    public function tolakPelanggaran()
    {
        $pelanggaran = new data_pelanggaran();
        $data = $pelanggaran->getDetailPelanggaran($_POST['kode_pelanggaran']);
        $data[0]->is_done = 1;
        $data[0]->updateDataPelanggaran($_POST['kode_pelanggaran']);
        echo "success";
    }

    public function aksiBanding()
    {
        $banding = new banding();
        $theBanding = $banding->getBanding('BNG-' . $_POST['kode_pelanggaran']);
        $theBanding[0]->is_accepted = $_POST['is_accepted'] == 1 ? 1 : 0;
        $theBanding[0]->updateBanding('BNG-' . $_POST['kode_pelanggaran']);

        if ($_POST['is_accepted'] == 1) {
            $pelanggaran = new data_pelanggaran();
            $data = $pelanggaran->getDetailPelanggaran($_POST['kode_pelanggaran']);
            $data[0]->is_verified = 1;
            $data[0]->is_banding = 1;
            $data[0]->is_done = 1;
            $data[0]->updateDataPelanggaran($_POST['kode_pelanggaran']);
        } else {
            $pelanggaran = new data_pelanggaran();
            $data = $pelanggaran->getDetailPelanggaran($_POST['kode_pelanggaran']);
            $data[0]->is_verified = 1;
            $data[0]->is_banding = 1;
            $data[0]->is_done = 0;
            $data[0]->updateDataPelanggaran($_POST['kode_pelanggaran']);
        }

        echo "success";
    }
}
