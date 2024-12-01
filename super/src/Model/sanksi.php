<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;

class sanksi
{
    public $id_sanksi, $kode_pelanggaran, $nama_sanksi, $tautan_sanksi, $is_done, $datetime;

    public function __construct()
    {

    }

    public function getSanksi(?string $id_sanksi) {
        $result = [];

        if (empty($id_sanksi)) {
            $query = "SELECT * FROM sanksi";
        } else {
            $query = "SELECT * FROM sanksi WHERE id_sanksi = '$id_sanksi'";
        }

        $conn = Db::getInstance();
        try {
            $queryRes = $conn->query($query);
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $temp = new sanksi();
                $temp->id_sanksi = $row['id_sanksi'];
                $temp->kode_pelanggaran = $row['kode_pelanggaran'];
                $temp->nama_sanksi = $row['nama_sanksi'];
                $temp->tautan_sanksi = $row['tautan_sanksi'];
                $temp->is_done = $row['is_done'];
                $temp->datetime = $row['datetime'];
                array_push($result, $temp);
            }
            if (count($result) == 0) {
                Helper::dumpToLog("sanksi tidak ditemukan");
                return null;
            }
            Helper::dumpToLog("sukses get sanksi");
            return $result;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal get sanksi: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    public function insertSanksi() {
        $rand = Helper::randomAlphaNum();
        $fullId = "SNK-" . $rand;
        $conn = Db::getInstance();
        try {
            $query = "INSERT INTO sanksi VALUES (?,?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$fullId, $this->kode_pelanggaran, $this->nama_sanksi, $this->tautan_sanksi, $this->is_done, $this->datetime]);
            Helper::dumpToLog("sukses insert sanksi $fullId");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal insert sanksi $fullId: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    public function updateSanksi($id_sanksi) {
        $check = $this->getSanksi($id_sanksi);
        if ($check == null) {
            Helper::dumpToLog("sanksi $id_sanksi tidak ditemukan");
            return '0';
        }

        $conn = Db::getInstance();
        try {
            $query = "UPDATE sanksi SET kode_pelanggaran = ?, nama_sanksi = ?, tautan_sanksi = ?, is_done = ?, datetime = ? WHERE id_sanksi = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->kode_pelanggaran, $this->nama_sanksi, $this->tautan_sanksi, $this->is_done, $this->datetime, $id_sanksi]);
            Helper::dumpToLog("sukses update sanksi $id_sanksi");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal update sanksi $id_sanksi: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function deleteSanksi($id_sanksi)
    {
        $check = $this->getSanksi($id_sanksi);
        if ($check == null) {
            Helper::dumpToLog("sanksi $id_sanksi tidak ditemukan");
            return '0';
        }

        $conn = Db::getInstance();
        try {
            $query = "DELETE FROM sanksi WHERE id_sanksi = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$id_sanksi]);
            Helper::dumpToLog("sukses delete sanksi $id_sanksi");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal delete sanksi $id_sanksi: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }
}