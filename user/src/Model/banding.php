<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;

class banding
{
    public $id_banding, $tautan_banding, $is_accepted, $datetime, $deskripsi;

    public function __construct()
    {
    }

    function getBanding(?string $id_banding)
    {
        $result = [];

        if (empty($id_banding)) {
            $query = "SELECT * FROM banding";
        } else {
            $query = "SELECT * FROM banding WHERE id_banding = '$id_banding'";
        }

        $conn = Db::getInstance();
        try {
            $queryRes = $conn->query($query);
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $temp = new banding();
                $temp->id_banding = $row['id_banding'];
                $temp->tautan_banding = $row['tautan_banding'];
                $temp->is_accepted = $row['is_accepted'];
                $temp->datetime = $row['datetime'];
                $temp->deskripsi = $row['deskripsi'];
                array_push($result, $temp);
            }
            if (count($result) == 0) {
                Helper::dumpToLog("banding tidak ditemukan");
                return null;
            }
            Helper::dumpToLog("sukses get banding");
            return $result;
        } catch (\Throwable $th) {
            return false . " " . $th->getMessage();
        }
    }

    function insertBanding()
    {
        $conn = Db::getInstance();
        try {
            $query = "INSERT INTO banding VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->id_banding, $this->tautan_banding, $this->is_accepted, $this->datetime, $this->deskripsi]);
            Helper::dumpToLog("sukses insert banding");
            return true;
        } catch (\Throwable $th) {
            Helper::dumpToLog("gagal insert banding: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function updateBanding($id_banding)
    {
        $check = $this->getBanding($id_banding);
        if ($check == null) {
            Helper::dumpToLog("banding $id_banding tidak ditemukan");
            return '0';
        }
        $conn = Db::getInstance();
        try {
            $query = "UPDATE banding SET tautan_banding = ?, is_accepted = ?, datetime = ?, deskripsi = ? WHERE id_banding = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->tautan_banding, $this->is_accepted, $this->datetime, $this->deskripsi, $id_banding]);
            Helper::dumpToLog("sukses update banding $id_banding");
            return true;
        } catch (\Throwable $th) {
            Helper::dumpToLog("gagal update banding $id_banding: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    function deleteBanding($id_banding)
    {
        $check = $this->getBanding($id_banding);
        if ($check == null) {
            Helper::dumpToLog("banding $id_banding tidak ditemukan");
            return '0';
        }
        $conn = Db::getInstance();
        try {
            $query = "DELETE FROM banding WHERE id_banding = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$id_banding]);
            Helper::dumpToLog("sukses delete banding $id_banding");
            return true;
        } catch (\Throwable $th) {
            Helper::dumpToLog("gagal delete banding $id_banding: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }
}