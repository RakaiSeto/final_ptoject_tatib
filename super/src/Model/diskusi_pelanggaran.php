<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Helper;

class diskusi_pelanggaran
{
    public $kode_diskusi, $kode_pelanggaran, $nip, $nim, $pesan, $datetime;

    function __construct()
    {

    }

    function getDiskusiPelanggaran(?string $kode_pelanggaran) {
        $result = [];

        if (empty($kode_pelanggaran)) {
            $query = "SELECT * FROM diskusi_pelanggaran";
        } else {
            $query = "SELECT * FROM diskusi_pelanggaran WHERE kode_pelanggaran = '$kode_pelanggaran'";
        }

        $conn = Db::getInstance();
        try {
            $queryRes = $conn->query($query);
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $temp = new diskusi_pelanggaran();
                $temp->kode_diskusi = $row['kode_diskusi'];
                $temp->kode_pelanggaran = $row['kode_pelanggaran'];
                $temp->nip = $row['nip'];
                $temp->nim = $row['nim'];
                $temp->pesan = $row['pesan'];
                $temp->datetime = $row['datetime'];
                array_push($result, $temp);
            }
            if (count($result) == 0) {
                Helper::dumpToLog("diskusi pelanggaran tidak ditemukan");
                return null;
            }
            Helper::dumpToLog("sukses get diskusi_pelanggaran");
            return $result;
        } catch (\Throwable $th) {
            Helper::dumpToLog("gagal get diskusi_pelanggaran: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function insertDiskusiPelanggaran()
    {
        $rand = Helper::randomAlphaNum();
        $fullId = "DSK-$this->kode_pelanggaran-" . $rand;
        $conn = Db::getInstance();
        try {
            $query = "INSERT INTO diskusi_pelanggaran VALUES (?,?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$fullId, $this->kode_pelanggaran, $this->nip, $this->nim, $this->pesan, $this->datetime]);
            Helper::dumpToLog("sukses insert diskusi_pelanggaran $fullId");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal insert diskusi_pelanggaran: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function updateDiskusiPelanggaran($kode_diskusi) {
        $check = $this->getDiskusiPelanggaran($kode_diskusi);
        if ($check == null) {
            Helper::dumpToLog("diskusi_pelanggaran $kode_diskusi tidak ditemukan");
            return '0';
        }

        $conn = Db::getInstance();
        try {
            $query = "UPDATE diskusi_pelanggaran SET nip = ?, nim = ?, pesan = ?, datetime = ? WHERE kode_diskusi = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->nip, $this->nim, $this->pesan, $this->datetime, $kode_diskusi]);
            Helper::dumpToLog("sukses update diskusi_pelanggaran $kode_diskusi");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal update diskusi_pelanggaran $kode_diskusi: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function deleteDiskusiPelanggaran($kode_diskusi)
    {
        $check = $this->getDiskusiPelanggaran($kode_diskusi);
        if ($check == null) {
            Helper::dumpToLog("diskusi_pelanggaran $kode_diskusi tidak ditemukan");
            return '0';
        }

        $conn = Db::getInstance();
        try {
            $query = "DELETE FROM diskusi_pelanggaran WHERE kode_diskusi = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$kode_diskusi]);
            Helper::dumpToLog("sukses delete diskusi_pelanggaran $kode_diskusi");
            return true;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal delete diskusi_pelanggaran $kode_diskusi: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }
}