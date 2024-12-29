<?php

namespace Tatib\Src\Model;

use Tatib\Src\Core\Db;
use Tatib\Src\Core\Helper;

class data_pelanggaran
{
    public $kode_pelanggaran, $jenis_pelanggaran, $kronologi, $tautan_bukti, $nip_pelapor, $nim_terlapor, $is_verified, $is_banding, $is_done, $datetime, $tingkat_pelanggaran, $detail, $nama_pelapor, $nama_terlapor, $status, $kelas;

    public function __construct() {}

    public function getDataPelanggaran(?string $kode_pelanggaran = null, string $kategori = null, string $value = null, string $tanggal_mulai = null, string $tanggal_akhir = null)
    {
        $result = [];

        if ($kategori != null && $value != null) {
            if (empty($kode_pelanggaran)) {
                $query = "SELECT dat.kode_pelanggaran, daf.deskripsi as jenis_pelanggaran, daf.tingkat_pelanggaran, dat.kronologi, dat.nip_pelapor, peg.nama_pegawai, dat.nim_terlapor, mah.nama_mahasiswa, dat.is_verified, dat.is_banding, dat.is_done, dat.datetime, dat.tautan_bukti, kel.id_kelas FROM data_pelanggaran dat 
                left join daftar_pelanggaran daf on daf.kode_pelanggaran = dat.jenis_pelanggaran
                left join pegawai peg on peg.nip = dat.nip_pelapor
                left join mahasiswa mah on mah.nim = dat.nim_terlapor
                left join kelas kel on kel.id_kelas = mah.id_kelas
                WHERE $kategori LIKE '%$value%'";

                if ($tanggal_mulai != null && $tanggal_akhir != null) {
                    $query .= " AND dat.datetime BETWEEN '$tanggal_mulai' AND '$tanggal_akhir'";
                } else if ($tanggal_mulai != null) {
                    $query .= " AND dat.datetime >= '$tanggal_mulai'";
                } else if ($tanggal_akhir != null) {
                    $query .= " AND dat.datetime BETWEEN '$tanggal_akhir' AND DATEADD(MONTH, -1, '$tanggal_akhir')";
                }
            } else {
                $query = "SELECT dat.kode_pelanggaran, daf.deskripsi as jenis_pelanggaran, daf.tingkat_pelanggaran, dat.kronologi, dat.nip_pelapor, peg.nama_pegawai, dat.nim_terlapor, mah.nama_mahasiswa, dat.is_verified, dat.is_banding, dat.is_done, dat.datetime, dat.tautan_bukti, kel.id_kelas FROM data_pelanggaran dat 
                left join daftar_pelanggaran daf on daf.kode_pelanggaran = dat.jenis_pelanggaran
                left join pegawai peg on peg.nip = dat.nip_pelapor
                left join mahasiswa mah on mah.nim = dat.nim_terlapor
                left join kelas kel on kel.id_kelas = mah.id_kelas
                WHERE dat.kode_pelanggaran = '$kode_pelanggaran' AND $kategori LIKE '%$value%'";

                if ($tanggal_mulai != null && $tanggal_akhir != null) {
                    $query .= " AND dat.datetime BETWEEN '$tanggal_mulai' AND '$tanggal_akhir'";
                } else if ($tanggal_mulai != null) {
                    $query .= " AND dat.datetime >= '$tanggal_mulai'";
                } else if ($tanggal_akhir != null) {
                    $query .= " AND dat.datetime BETWEEN '$tanggal_akhir' AND DATEADD(MONTH, -1, '$tanggal_akhir')";
                }
            }
        } else {
            if (empty($kode_pelanggaran)) {
                $query = "SELECT dat.kode_pelanggaran, daf.deskripsi as jenis_pelanggaran, daf.tingkat_pelanggaran, dat.kronologi, dat.nip_pelapor, peg.nama_pegawai, dat.nim_terlapor, mah.nama_mahasiswa, dat.is_verified, dat.is_banding, dat.is_done, dat.datetime, dat.tautan_bukti, kel.id_kelas FROM data_pelanggaran dat 
                left join daftar_pelanggaran daf on daf.kode_pelanggaran = dat.jenis_pelanggaran
                left join pegawai peg on peg.nip = dat.nip_pelapor
                left join mahasiswa mah on mah.nim = dat.nim_terlapor
                left join kelas kel on kel.id_kelas = mah.id_kelas";

                if ($tanggal_mulai != null && $tanggal_akhir != null) {
                    $query .= " WHERE dat.datetime BETWEEN '$tanggal_mulai' AND '$tanggal_akhir'";
                } else if ($tanggal_mulai != null) {
                    $query .= " WHERE dat.datetime >= '$tanggal_mulai'";
                } else if ($tanggal_akhir != null) {
                    $query .= " WHERE dat.datetime BETWEEN '$tanggal_akhir' AND DATEADD(MONTH, -1, '$tanggal_akhir')";
                }
            } else {
                $query = "SELECT dat.kode_pelanggaran, daf.deskripsi as jenis_pelanggaran, daf.tingkat_pelanggaran, dat.kronologi, dat.nip_pelapor, peg.nama_pegawai, dat.nim_terlapor, mah.nama_mahasiswa, dat.is_verified, dat.is_banding, dat.is_done, dat.datetime, dat.tautan_bukti, kel.id_kelas FROM data_pelanggaran dat 
                left join daftar_pelanggaran daf on daf.kode_pelanggaran = dat.jenis_pelanggaran
                left join pegawai peg on peg.nip = dat.nip_pelapor
                left join mahasiswa mah on mah.nim = dat.nim_terlapor
                left join kelas kel on kel.id_kelas = mah.id_kelas
                WHERE dat.kode_pelanggaran = '$kode_pelanggaran'";

                if ($tanggal_mulai != null && $tanggal_akhir != null) {
                    $query .= " AND dat.datetime BETWEEN '$tanggal_mulai' AND '$tanggal_akhir'";
                } else if ($tanggal_mulai != null) {
                    $query .= " AND dat.datetime >= '$tanggal_mulai'";
                } else if ($tanggal_akhir != null) {
                    $query .= " AND dat.datetime BETWEEN '$tanggal_akhir' AND DATEADD(MONTH, -1, '$tanggal_akhir')";
                }
            }
        }

        $query .= " ORDER BY dat.datetime DESC";

        $conn = Db::getInstance();
        try {
            $queryRes = $conn->query($query);
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $temp = new data_pelanggaran();
                $temp->kode_pelanggaran = $row['kode_pelanggaran'];
                $temp->jenis_pelanggaran = $row['jenis_pelanggaran'] ?? '-';
                $temp->tingkat_pelanggaran = $row['tingkat_pelanggaran'] ?? '-';
                $temp->kronologi = $row['kronologi'];
                $temp->tautan_bukti = Helper::checkFileExist($row['tautan_bukti']) ? Helper::lastFullstopToHyphen($row['tautan_bukti']) : '-';
                $temp->nip_pelapor = $row['nip_pelapor'];
                $temp->nim_terlapor = $row['nim_terlapor'];
                $temp->nama_pelapor = $row['nama_pegawai'];
                $temp->nama_terlapor = $row['nama_mahasiswa'];
                $temp->is_verified = $row['is_verified'];
                $temp->is_banding = $row['is_banding'];
                $temp->is_done = $row['is_done'];
                $temp->datetime = $row['datetime'];
                $temp->kelas = $row['id_kelas'];
                array_push($result, $temp);
            }
            if (count($result) == 0) {
                Helper::dumpToLog("data pelanggaran tidak ditemukan");
                return null;
            }
            Helper::dumpToLog("data pelanggaran ditemukan");
            return $result;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal mengambil data pelanggaran: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    public function getDataPelanggaranByRole(string $role, string $keyword, bool $verify)
    {
        $conn = Db::getInstance();
        $result = [];
        try {
            if ($role == 'dpa-kps') {
                $arrKelas = explode($keyword, '-');
                $prodi = end($arrKelas);

                $query = "SELECT dat.datetime, mah.nama_mahasiswa, daf.deskripsi, mah.nim, dat.kode_pelanggaran, dat.is_verified, dat.is_banding, dat.is_done FROM data_pelanggaran dat
                LEFT JOIN mahasiswa mah ON dat.nim_terlapor = mah.nim
                LEFT JOIN daftar_pelanggaran daf ON dat.jenis_pelanggaran = daf.kode_pelanggaran
                WHERE lower(mah.id_kelas) like lower('%$keyword%') OR
                lower(mah.id_prodi) like lower ('%$prodi%')";   
            } else if ($role == 'dpa') {
                $query = "SELECT dat.datetime, mah.nama_mahasiswa, daf.deskripsi, mah.nim, dat.kode_pelanggaran, dat.is_verified, dat.is_banding, dat.is_done FROM data_pelanggaran dat
                LEFT JOIN mahasiswa mah ON dat.nim_terlapor = mah.nim
                LEFT JOIN daftar_pelanggaran daf ON dat.jenis_pelanggaran = daf.kode_pelanggaran
                WHERE lower(mah.id_kelas) like lower('%$keyword%')";
            } else if ($role == 'kps' || $role == 'admin') {
                $query = "SELECT dat.datetime, mah.nama_mahasiswa, daf.deskripsi, mah.nim, dat.kode_pelanggaran, dat.is_verified, dat.is_banding, dat.is_done FROM data_pelanggaran dat
                LEFT JOIN mahasiswa mah ON dat.nim_terlapor = mah.nim
                LEFT JOIN daftar_pelanggaran daf ON dat.jenis_pelanggaran = daf.kode_pelanggaran
                WHERE lower(mah.id_prodi) like lower('%$keyword%')";
            }

            if ($verify == 'true') {
                $query .= " AND dat.is_verified = 0";
            }

            $query .= " ORDER BY dat.is_done, dat.datetime DESC";

            $queryRes = $conn->query($query);
            while ($row = $queryRes->fetch(\PDO::FETCH_ASSOC)) {
                $temp = [];
                $temp['datetime'] = date('d-m-Y', strtotime($row['datetime']));
                $temp['nama_mahasiswa'] = $row['nama_mahasiswa'];
                $temp['deskripsi'] = $row['deskripsi'];
                $temp['nim'] = $row['nim'];
                $temp['kode_pelanggaran'] = $row['kode_pelanggaran'];
                if ($row['is_done'] == 1) {
                    $temp['status'] = '<span class="badge bg-success">Selesai</span>';
                    $temp['aksi'] = '<button class="btn btn-primary" onclick="detailPelanggaran(\''. $row['kode_pelanggaran'] . '\')">Detail</button>';
                } else if ($row['is_banding'] == 1 && $row['is_verified'] == 0) {
                    $temp['status'] = '<span class="badge bg-warning">Banding</span>';
                    $temp['aksi'] = '<button class="btn btn-warning" onclick="bandingPelanggaran(\''. $row['kode_pelanggaran'] . '\')">Lihat Banding</button>';
                } else if ($row['is_verified'] == 1) {
                    $temp['status'] = '<span class="badge bg-info">Proses</span>';
                    $temp['aksi'] = '<button class="btn btn-primary" onclick="detailPelanggaran(\''. $row['kode_pelanggaran'] . '\')">Detail</button>';
                } else {
                    $temp['status'] = '<span class="badge bg-danger">Menunggu Verifikasi</span>';
                    $temp['aksi'] = '<button class="btn btn-success" onclick="verifikasiPelanggaran(\''. $row['kode_pelanggaran'] . '\')">Verifikasi</button>';
                }
                array_push($result, $temp);
            }
            return $result;
        } catch (\PDOException $th) {
            Helper::dumpToLog("gagal mengambil data pelanggaran: " . $th->getMessage());
            return false . " " . $th->getMessage();
        }
    }

    public function insertDataPelanggaran()
    {
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

    public function updateDataPelanggaran(string $kode_pelanggaran)
    {
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

    public function deleteDataPelanggaran(string $kode_pelanggaran)
    {
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
