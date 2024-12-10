<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;

class mahasiswa
{
    public $nim, $nama_mahasiswa, $no_telp, $email, $id_kelas, $secret, $is_active, $foto_mahasiswa, $tanggal_lahir, $jenis_kelamin, $id_prodi, $password;

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
                $temp->foto_mahasiswa = $row['foto_mahasiswa'];
                $temp->tanggal_lahir = $row['tanggal_lahir'];
                $temp->jenis_kelamin = $row['jenis_kelamin'];
                $temp->id_prodi = $row['id_prodi'];
                $temp->password = $row['password'];
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

    function getMahasiswaByKelas(?string $id_kelas) {
        $result = [];

        if (empty($id_kelas)) {
            Helper::dumpToLog("gagal get mahasiswa");
            return false . " kelas harus diisi";
        } else {
            $query = "SELECT * FROM mahasiswa WHERE id_kelas = '$id_kelas'";
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
                $temp->foto_mahasiswa = Helper::lastFullstopToHyphen($row['foto_mahasiswa']);
                $temp->tanggal_lahir = $row['tanggal_lahir'];
                $temp->jenis_kelamin = $row['jenis_kelamin'];
                $temp->id_prodi = $row['id_prodi'];
                $temp->password = $row['password'];
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
        $query = "INSERT INTO mahasiswa VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->nim, $this->nama_mahasiswa, $this->no_telp, $this->email, $this->id_kelas, $this->secret, $this->is_active, $this->foto_mahasiswa, $this->tanggal_lahir, $this->jenis_kelamin, $this->id_prodi, $this->password]);
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

        $query = "UPDATE mahasiswa SET nama_mahasiswa = ?, no_telp = ?, email = ?, id_kelas = ?, secret = ?, is_active = ?, foto_mahasiswa = ?, tanggal_lahir = ?, jenis_kelamin = ?, id_prodi = ?, password = ? WHERE nim = ?";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->nama_mahasiswa, $this->no_telp, $this->email, $this->id_kelas, $this->secret, $this->is_active, $this->foto_mahasiswa, $this->tanggal_lahir, $this->jenis_kelamin, $this->id_prodi, $this->password, $nim]);
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