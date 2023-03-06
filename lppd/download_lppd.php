<?php

// koneksi ke database
$koneksi = mysqli_connect("localhost","root","","webadit");

// validasi input download
if (!isset($_GET['download'])) {
    die("File tidak ditemukan");
}

// filter input download
$file = filter_var($_GET['download'], FILTER_SANITIZE_STRING);

// mengambil data file dari database
$query = "SELECT * FROM lppd WHERE file_lppd = '$file'";
$result = mysqli_query($koneksi, $query);
if (!$result || mysqli_num_rows($result) == 0) {
    die("File tidak ditemukan");
}
$row = mysqli_fetch_assoc($result);
$path = "/".$row['file_lppd'];

// mendownload file
header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="'.basename($path).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($path));
readfile($path);
exit;
?>