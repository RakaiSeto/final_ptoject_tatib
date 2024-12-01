<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;

class auditrail
{
    public $role, $id, $action, $result, $description, $datetime;

    public function __construct() {

    }

    function insertAuditrail() {
        $conn = Db::getInstance();
        try {
            $query = "INSERT INTO auditrail VALUES (?,?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->role, $this->id, $this->action, $this->result, $this->description, $this->datetime]);
            Helper::dumpToLog("sukses insert auditrail");
            return true;
        } catch (\Throwable $th) {
            Helper::dumpToLog("gagal insert auditrail: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }
}