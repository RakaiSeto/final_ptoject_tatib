<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;

class kelas
{
    public $id_kelas, $nama_kelas, $nip_dpa, $nama_dpa;

    function __construct() {}

    function getKelas(?string $id_kelas = null) {
        $result = [];

        if (empty($id_kelas)) {
            $query = "SELECT kelas.*, nama_pegawai FROM kelas left join pegawai on kelas.nip_dpa = pegawai.nip";
        } else {
            $query = "SELECT kelas.*, nama_pegawai FROM kelas left join pegawai on kelas.nip_dpa = pegawai.nip WHERE id_kelas = '$id_kelas'";
        }
        $conn = Db::getInstance();
        try {
            $queryRes = $conn->query($query);
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $temp = new kelas();
                $temp->id_kelas = $row['id_kelas'];
                $temp->nama_kelas = $row['nama_kelas'];
                $temp->nip_dpa = $row['nip_dpa'];
                $temp->nama_dpa = $row['nama_pegawai'];

                array_push($result, $temp);
            }
            if (count($result) == 0) {
                return null;
            }
            Helper::dumpToLog("success get kelas");
            return $result;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal get kelas: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function getKelasByDpa(string $nip_dpa) {
        $result = [];
        $query = "SELECT * FROM kelas WHERE nip_dpa = '$nip_dpa'";
        $conn = Db::getInstance();
        try {
            $queryRes = $conn->query($query);
            if ($queryRes->rowCount() == 0) {
                return null;
            }
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $temp = new kelas();
                $temp->id_kelas = $row['id_kelas'];
                $temp->nama_kelas = $row['nama_kelas'];
                $temp->nip_dpa = $row['nip_dpa'];
                array_push($result, $temp);
            }
            return $result;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal get kelas by dpa: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function insertKelas() {

        $duplicate = $this->getKelas($this->id_kelas);
        if ($duplicate != null) {
            Helper::dumpToLog("duplicate key kelas $this->id_kelas");
            return "duplicate";
        }
        $query = "INSERT INTO kelas VALUES(?, ?, ?)";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->id_kelas, $this->nama_kelas, $this->nip_dpa]);
            Helper::dumpToLog("success insert kelas $this->id_kelas");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal insert kelas $this->id_kelas: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function updateKelas(string $id_kelas) {
        $check = $this->getKelas($id_kelas);
        if ($check == null) {
            Helper::dumpToLog("kelas $id_kelas tidak ditemukan");
            return '0';
        }

        $query = "UPDATE kelas SET nama_kelas = ?, nip_dpa = ? WHERE id_kelas = ?";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->nama_kelas, $this->nip_dpa, $id_kelas]);
            Helper::dumpToLog("success update kelas $id_kelas");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal update kelas $id_kelas: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function deleteKelas(string $id_kelas) {
        $check = $this->getKelas($id_kelas);
        if ($check == null) {
            Helper::dumpToLog("kelas $id_kelas tidak ditemukan");
            return '0';
        }

        $query = "DELETE FROM kelas WHERE id_kelas = ?";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$id_kelas]);
            Helper::dumpToLog("success delete kelas $id_kelas");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal delete kelas $id_kelas: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }


    public function getAllDpa()
    {
        // Query untuk mengambil DPA berdasarkan nilai is_dpa = 1
        $query = "SELECT nip, nama_pegawai FROM pegawai WHERE is_dpa = 1";
        
        // Menjalankan query
        $conn = Db::getInstance();  // Pastikan ini mengarah ke koneksi database yang benar
        try {
            $queryRes = $conn->query($query);
            $result = [];
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $result[] = $row;  // Menyimpan hasil query ke dalam array
            }
            return $result;  // Mengembalikan daftar DPA
        } catch (\PDOException $th) {
            Helper::dumpToLog("Gagal mengambil DPA: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }
    
    
}