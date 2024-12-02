<?php
$serverName = "46.250.233.211,1433";  // Misal, jika menggunakan SQL Server Express
$connectionOptions = array(
    "Database" => "pbltatib",
    "Uid" => "PBL_ADMIN",  // Ganti dengan username Anda
    "PWD" => "TatibPastiBisa123",   // Ganti dengan password Anda
    "TrustServerCertificate" => true  // Mengabaikan sertifikat SSL jika ada
);

// Koneksi ke database SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn) {
    echo "Koneksi berhasil!";
} else {
    echo "Koneksi gagal!";
}

?>