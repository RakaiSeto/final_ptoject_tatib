<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Model\data_pelanggaran;

class PelanggaranController extends Controller
{
    public function pelanggaran()
    {
        if (!isset($_COOKIE['user'])) {
            header("Location: /");
            return;
        }
        $pelanggaran = new data_pelanggaran();
        $data = $pelanggaran->getDataPelanggaran();
        $this->render('page/dataPelanggaran', [
            'title' => 'Data Pelanggaran',
            'data' => $data
        ]);
    }

    public function getDataPelanggaran()
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
}

