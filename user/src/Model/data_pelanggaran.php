<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;

class
data_pelanggaran
{
    public $kode_pelanggaran, $jenis_pelanggaran, $kronologi, $tautan_bukti, $nip_pelapor, $nim_terlapor, $is_verified, $is_banding, $is_done, $datetime;

    public function __construct() {}

    public function getDataPelanggaran(?string $kode_pelanggaran) {
        $result = [];

        if (empty($kode_pelanggaran)) {
            $query = "SELECT * FROM data_pelanggaran";
        } else {
            $query = "SELECT * FROM data_pelanggaran WHERE kode_pelanggaran = '$kode_pelanggaran'";
        }

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

    public function insertDataPelanggaran() {
        $rand = Helper::randomAlphaNum();
        $fullId = "PLG-$this->nim_terlapor-" . $rand;
        $conn = Db::getInstance();
        try {
            $query = "INSERT INTO data_pelanggaran VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$fullId, $this->jenis_pelanggaran, $this->kronologi, $this->tautan_bukti, $this->nip_pelapor, $this->nim_terlapor, $this->is_verified, $this->is_banding, $this->is_done]);
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