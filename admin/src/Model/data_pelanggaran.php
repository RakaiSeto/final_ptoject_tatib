<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;

class data_pelanggaran
{
     public $kode_pelanggaran, $jenis_pelanggaran, $kronologi, $tautan_bukti, $nip_pelapor, 
           $nim_terlapor, $is_verified, $is_banding, $is_done, $datetime, 
           $nim, $nama_mahasiswa, $tingkat_pelanggaran, $nama_pegawai;

    public function __construct() {}
    
    public function getDataPelanggaran(?string $kode_pelanggaran) {
        $result = [];
        $query = "
            SELECT dp.kode_pelanggaran, dp.jenis_pelanggaran, dp.kronologi, dp.tautan_bukti, 
                   dp.nip_pelapor, dp.nim_terlapor, dp.is_verified, dp.is_banding, dp.is_done, dp.datetime,
                   m.nim, m.nama_mahasiswa, dpl.tingkat_pelanggaran, p.nama_pegawai
            FROM data_pelanggaran dp
            LEFT JOIN mahasiswa m ON dp.nim_terlapor = m.nim
            LEFT JOIN pegawai p ON dp.nip_pelapor = p.nip
            LEFT JOIN daftar_pelanggaran dpl ON dp.kode_pelanggaran = dpl.kode_pelanggaran
        ";
        if (!empty($kode_pelanggaran)) {
            $query .= " WHERE dp.kode_pelanggaran = :kode_pelanggaran";
        }
        $conn = Db::getInstance();
        try {
            $stmt = $conn->prepare($query);
            if (!empty($kode_pelanggaran)) {
                $stmt->bindParam(':kode_pelanggaran', $kode_pelanggaran);
            }
            $stmt->execute();
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $temp = new data_pelanggaran();
                $temp->kode_pelanggaran = $row['kode_pelanggaran'];
                $temp->jenis_pelanggaran = $row['jenis_pelanggaran'];
                $temp->kronologi = $row['kronologi'];
                $temp->tautan_bukti = $row['tautan_bukti'];
                $temp->nip_pelapor = $row['nip_pelapor'];
                $temp->nim_terlapor = $row['nim_terlapor'];
                $temp->is_verified = $row['is_verified'];
                $temp->is_banding = $row['is_banding'];
                $temp->is_done = $row['is_done'];
                $temp->datetime = $row['datetime'];
                $temp->nim = $row['nim'];
                $temp->nama_mahasiswa = $row['nama_mahasiswa'];
                $temp->tingkat_pelanggaran = $row['tingkat_pelanggaran'];
                $temp->nama_pegawai = $row['nama_pegawai'];  // Menambahkan nama pegawai
                $result[] = $temp;
            }
            return $result ?: null;
        } catch (\PDOException $th) {
            return false . " " . $th->getMessage();
        }
    }
    
    

    public function getByNimTerlapor(string $nim_terlapor) {
        $query = "SELECT * FROM data_pelanggaran WHERE nim_terlapor = '$nim_terlapor'";

        $conn = Db::getInstance();
        try {
            $queryRes = $conn->query($query);
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $temp = new data_pelanggaran();
                $temp->kode_pelanggaran = $row['kode_pelanggaran'];
                $temp->jenis_pelanggaran = $row['jenis_pelanggaran'];
                $temp->kronologi = $row['kronologi'];
                $temp->tautan_bukti = $row['tautan_bukti'];
                $temp->nip_pelapor = $row['nip_pelapor'];
                $temp->nim_terlapor = $row['nim_terlapor'];
                $temp->is_verified = $row['is_verified'];
                $temp->is_banding = $row['is_banding'];
                $temp->is_done = $row['is_done'];
                $temp->datetime = $row['datetime'];
                return $temp;
            }
            return null;
        } catch (\PDOException $th) {
            return false . " " . $th->getMessage();
        }
    }

    public function insertDataPelanggaran() {
        $rand = Helper::randomAlphaNum();
        $fullId = 'PEL' . date('dmy') . '-' . Helper::randomAlphaNum();
        $conn = Db::getInstance();
        try {
            $query = "INSERT INTO data_pelanggaran VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$fullId, $this->jenis_pelanggaran, $this->kronologi, $this->tautan_bukti, $this->nip_pelapor, $this->nim_terlapor, $this->is_verified, $this->is_banding, $this->is_done, $this->datetime]);
            Helper::dumpToLog("success insert data pelanggaran $rand");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal insert data pelanggaran: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    public function updateDataPelanggaran(string $kode_pelanggaran) {
        $conn = Db::getInstance();
        try {
            $query = "UPDATE data_pelanggaran SET jenis_pelanggaran = ?, kronologi = ?, tautan_bukti = ?, is_verified = ?, is_banding = ?, is_done = ? WHERE kode_pelanggaran = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->jenis_pelanggaran, $this->kronologi, $this->tautan_bukti, $this->is_verified, $this->is_banding, $this->is_done, $kode_pelanggaran]);
            Helper::dumpToLog("success update data pelanggaran $this->kode_pelanggaran");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal update data pelanggaran $this->kode_pelanggaran: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    public function deleteDataPelanggaran(string $kode_pelanggaran) {
        $conn = Db::getInstance();
        try {
            $query = "DELETE FROM data_pelanggaran WHERE kode_pelanggaran = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$kode_pelanggaran]);
            Helper::dumpToLog("success delete data pelanggaran $this->kode_pelanggaran");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal delete data pelanggaran $this->kode_pelanggaran: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }
}