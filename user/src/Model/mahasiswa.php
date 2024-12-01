<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;

class mahasiswa
{
    public $nim, $nama_mahasiswa, $no_telp, $email, $id_kelas, $secret, $is_active;

    function __construct() {}

    function getMahasiswa(?string $nim)
    {
        $result = [];

        if (empty($nim)) {
            $query = "SELECT * FROM mahasiswa";
        } else {
            $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
        }
        $conn = Db::getInstance();
        try {
            $queryRes = $conn->query($query);
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $temp = new mahasiswa();
                $temp->nim = $row['nim'];
                $temp->nama_mahasiswa = $row['nama_mahasiswa'];
                $temp->no_telp = $row['no_telp'];
                $temp->email = $row['email'];
                $temp->id_kelas = $row['id_kelas'];
                $temp->secret = $row['secret'];
                $temp->is_active = $row['is_active'];
                array_push($result, $temp);
            }
            if (count($result) == 0) {
                return null;
            }
            Helper::dumpToLog("success get mahasiswa");
            return $result;
        } catch (\Throwable $th) {
            Helper::dumpToLog("gagal get mahasiswa");
            return false . " " . $th->getMessage();
        }
    }

    function insertMahasiswa() {

        $duplicate = $this->getMahasiswa($this->nim);
        if ($duplicate != null) {
            Helper::dumpToLog("duplicate key mahasiswa $this->nim");
            return "duplicate";
        }
        $query = "INSERT INTO mahasiswa VALUES(?, ?, ?, ?, ?, ?, ?)";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->nim, $this->nama_mahasiswa, $this->no_telp, $this->email, $this->id_kelas, $this->secret, $this->is_active]);
            Helper::dumpToLog("success insert mahasiswa $this->nim");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal insert mahasiswa $this->nim " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function updateMahasiswa(string $nim)
    {
        $check = $this->getMahasiswa($nim);
        if ($check == null) {
            Helper::dumpToLog("mahasiswa $nim tidak ditemukan");
            return '0';
        }

        $query = "UPDATE mahasiswa SET nama_mahasiswa = ?, no_telp = ?, email = ?, id_kelas = ?, secret = ?, is_active = ? WHERE nim = ?";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->nama_mahasiswa, $this->no_telp, $this->email, $this->id_kelas, $this->secret, $this->is_active, $nim]);
            Helper::dumpToLog("success update mahasiswa $nim");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal update mahasiswa $nim: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function deleteMahasiswa(string $nim)
    {
        $check = $this->getMahasiswa($nim);
        if ($check == null) {
            Helper::dumpToLog("mahasiswa $nim tidak ditemukan");
            return '0';
        }

        $query = "DELETE FROM mahasiswa WHERE nim = ?";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$nim]);
            Helper::dumpToLog("success delete mahasiswa $nim");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal delete mahasiswa $nim: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }
}