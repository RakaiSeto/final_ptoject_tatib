<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;

class pegawai
{
    public $nip, $nama_pegawai, $role, $email, $no_telp, $prodi, $is_dpa, $is_kps;

    function __construct() {
    }

    function getPegawai(?string $nip)
    {
        $result = [];

        if (empty($nip)) {
            $query = "SELECT * FROM pegawai";
        } else {
            $query = "SELECT * FROM pegawai WHERE nip = '$nip'";
        }
        $conn = Db::getInstance();
        try {
            $queryRes = $conn->query($query);
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $temp = new pegawai();
                $temp->nip = $row['nip'];
                $temp->nama_pegawai = $row['nama_pegawai'];
                $temp->role = $row['role'];
                $temp->email = $row['email'];
                $temp->no_telp = $row['no_telp'];
                $temp->prodi = $row['prodi'];
                $temp->is_dpa = $row['is_dpa'] == 1 ? true : false;
                $temp->is_kps = $row['is_kps'] == 1 ? true : false;
                array_push($result, $temp);
            }
            if (count($result) == 0) {
                return null;
            }
            Helper::dumpToLog("success get pegawai");
            return $result;
        } catch (\PDOException $e) {
            Helper::dumpToLog("error get pegawai: " . $e->getMessage());
            return false . " " . $e->getMessage();
        }
    }

    function insertPegawai()
    {
        $duplicate =$this->getPegawai($this->nip);
        if ($duplicate != null) {
            Helper::dumpToLog("duplicate key pegawai $this->nama_pegawai");
            return "duplicate";
        }

        $query = "INSERT INTO pegawai VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->nip, $this->nama_pegawai, $this->role, $this->email, $this->no_telp, $this->prodi, $this->is_dpa, $this->is_kps]);
            Helper::dumpToLog("success insert pegawai $this->nama_pegawai");
            return true;
        } catch (\PDOException $e) {
            Helper::dumpToLog("error insert pegawai: " . $e->getMessage());
            return false . " " . $e->getMessage();
        }
    }

    function updatePegawai(string $nip)
    {
        $check = $this->getPegawai($nip);
        if ($check == null) {
            Helper::dumpToLog("pegawai $nip tidak ditemukan");
            return '0';
        }

        $query = "UPDATE pegawai SET nama = ?, role = ?, email = ?, no_telp = ?, prodi = ?, is_dpa = ?, is_kps = ? WHERE nip = ?";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->nama_pegawai, $this->role, $this->email, $this->no_telp, $this->prodi, $this->is_dpa, $this->is_kps, $nip]);
            Helper::dumpToLog("success update pegawai $nip");
            return true;
        } catch (\PDOException $e) {
            Helper::dumpToLog("error update pegawai $nip: " . $e->getMessage());
            return false . " " . $e->getMessage();
        }
    }

    function deletePegawai(string $nip) {
        $check = $this->getPegawai($nip);
        if ($check == null) {
            Helper::dumpToLog("pegawai $nip tidak ditemukan");
            return '0';
        }

        $query = "DELETE FROM pegawai WHERE nip = ?";
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute([$nip]);
            Helper::dumpToLog("success delete pegawai $nip");
            return true;
        } catch (\PDOException $e) {
            Helper::dumpToLog("error delete pegawai $nip: " . $e->getMessage());
            return false . " " . $e->getMessage();
        }
    }
}