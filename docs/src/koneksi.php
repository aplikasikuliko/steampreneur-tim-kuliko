<?php
mysqli_report(MYSQLI_REPORT_OFF);

$host = "localhost";
$dbname = "kuliko";
$username = "root";
$password = "";

$koneksi = mysqli_connect(
    $host,
    $username,
    $password,
    $dbname
);

if (!$koneksi) {
    error_log("Koneksi database KULIKO gagal.");
    http_response_code(500);
    exit("Layanan sedang mengalami gangguan. Silakan coba lagi.");
}

mysqli_set_charset($koneksi, "utf8mb4");
?>
