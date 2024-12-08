<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;

class daftar_pelanggaran
{
    public $kode_pelanggaran, $nama_pelanggaran, $deskripsi, $tingkat_pelanggaran;

    function __construct() {}

    function getDaftarPelanggaran(string $kode_pelanggaran = null) {
        $result = [];

        if (empty($kode_pelanggaran)) {
            $query = "SELECT * FROM daftar_pelanggaran";
        } else {
            $query = "SELECT * FROM daftar_pelanggaran WHERE kode_pelanggaran = '$kode_pelanggaran'";
        }
        $query = $query . " ORDER BY tingkat_pelanggaran DESC";

        $conn = Db::getInstance();
        try {
            $queryRes = $conn->query($query);
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $temp = new daftar_pelanggaran();
                $temp->kode_pelanggaran = $row['kode_pelanggaran'];
                $temp->nama_pelanggaran = $row['nama_pelanggaran'];
                $temp->deskripsi = $row['deskripsi'];
                $temp->tingkat_pelanggaran = $row['tingkat_pelanggaran'];
                array_push($result, $temp);
            }
            if (count($result) == 0) {
                return null;
            }
            return $result;
        } catch (\PDOException $th) {
            return false . " " . $th->getMessage();
        }
    }
    
    function insertDaftarPelanggaran() {
        $check = $this->getDaftarPelanggaran($this->kode_pelanggaran);
        if ($check != null) {
            Helper::dumpToLog("daftar pelanggaran $this->kode_pelanggaran sudah ada");
            return '0';
        } 
        
        $query = "INSERT INTO daftar_pelanggaran (kode_pelanggaran, nama_pelanggaran, deskripsi, tingkat_pelanggaran) VALUES (?, ?, ?, ?)";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->kode_pelanggaran, $this->nama_pelanggaran, $this->deskripsi, $this->tingkat_pelanggaran]);
            Helper::dumpToLog("success insert daftar pelanggaran $this->kode_pelanggaran");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal insert daftar pelanggaran $this->kode_pelanggaran: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function updateDaftarPelanggaran(string $id_pelanggaran)
    {
        $check = $this->getDaftarPelanggaran($id_pelanggaran);
        if ($check == null) {
            Helper::dumpToLog("daftar pelanggaran $id_pelanggaran tidak ditemukan");
            return '0';
        }

        $query = "UPDATE daftar_pelanggaran SET nama_pelanggaran = ?, deskripsi = ?, tingkat_pelanggaran = ? WHERE kode_pelanggaran = ?";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->nama_pelanggaran, $this->deskripsi, $this->tingkat_pelanggaran, $id_pelanggaran]);
            Helper::dumpToLog("success update daftar pelanggaran $id_pelanggaran");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal update daftar pelanggaran $id_pelanggaran: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function deleteDaftarPelanggaran(string $id_pelanggaran)
    {
        $check = $this->getDaftarPelanggaran($id_pelanggaran);
        if ($check == null) {
            Helper::dumpToLog("daftar pelanggaran $id_pelanggaran tidak ditemukan");
            return '0';
        }

        $query = "DELETE FROM daftar_pelanggaran WHERE kode_pelanggaran = ?";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$id_pelanggaran]);
            Helper::dumpToLog("success delete daftar pelanggaran $id_pelanggaran");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal delete daftar pelanggaran $id_pelanggaran: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }
    
}