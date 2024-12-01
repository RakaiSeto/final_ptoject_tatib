<?php

namespace Tatib\Src\Controller;

use Tatib\Src\Controller;
use Tatib\Src\Core\Db;
use Tatib\Src\Model\pegawai;

class PegawaiController extends Controller
{
    public function index() {
        $pegawai = new pegawai();
        $pegawai->getPegawai();
    }

    public function doCreate() {
        $pegawai = new pegawai();
        $pegawai->nip = "123";
        $pegawai->nama_pegawai = "gunawan";
        $pegawai->role = "dosen";
        $pegawai->email = "gunawan@dosen";
        $pegawai->no_telp = "1234567890";
        $pegawai->prodi = "TI";
        $pegawai->is_dpa = false;
        $pegawai->is_kps = false;
        $sucessInsert =$pegawai->insertPegawai();

        if ($sucessInsert == "duplicate") {
            echo "pegawai dengan nip tersebut sudah ada";
        } elseif ($sucessInsert) {
            echo "berhasil insert pegawai";
        } else {
            echo "gagal insert pegawai " . $sucessInsert;
        }
    }

    public function createPage()
    {
//        $this->render('pegawai');
    }

    public function get()
    {
        $pegawai = new pegawai();
        $resultQuery = $pegawai->getPegawai("123");
        if ($resultQuery == null) {
            echo "tidak ditemukan pegawai";
        } else if (!$resultQuery) {
            echo "gagal get pegawai";
        } else {
            echo json_encode($resultQuery);
        }
    }

    public function update()
    {
        $pegawai = new pegawai();
        $pegawai->nip = "123";
        $pegawai->nama_pegawai = "gunawan";
        $pegawai->role = "dosen";
        $pegawai->email = "gunawan@dosen";
        $pegawai->no_telp = "1234567890";
        $pegawai->prodi = "TI";
        $pegawai->is_dpa = false;
        $pegawai->is_kps = false;
        $resultQuery = $pegawai->updatePegawai("123");
        if ($resultQuery == '0') {
            echo "tidak ditemukan pegawai";
        } else if (!$resultQuery) {
            echo "gagal update pegawai";
        } else {
            echo "berhasil update pegawai";
        }
    }

    public function delete()
    {
        $pegawai = new pegawai();
        $resultQuery = $pegawai->deletePegawai("123");
        if ($resultQuery == '0') {
            echo "tidak ditemukan pegawai";
        } else if (!$resultQuery) {
            echo "gagal delete pegawai";
        } else {
            echo "berhasil delete pegawai";
        }
    }
}