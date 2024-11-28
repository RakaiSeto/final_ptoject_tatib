<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;

class pegawai
{
    public $nip, $nama_pegawai, $role, $email, $no_telp, $prodi, $is_dpa, $is_kps;

    function __construct($nip, $nama_pegawai, $role, $email, $no_telp, $prodi, $is_dpa, $is_kps) {
        $this->nip = $nip;
        $this->nama_pegawai = $nama_pegawai;
        $this->role = $role;
        $this->email = $email;
        $this->no_telp = $no_telp;
        $this->prodi = $prodi;
        $this->is_dpa = $is_dpa;
        $this->is_kps = $is_kps;
    }

    function insertPegawai() {
        $query = "INSERT INTO pegawai VALUES('$this->nip', '$this->nama_pegawai', '$this->role', '$this->email', '$this->no_telp', '$this->prodi', '$this->is_dpa', '$this->is_kps')";
        $conn = new Db();

    }
}