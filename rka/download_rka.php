<?php
//koneksi ke database
$koneksi = mysqli_connect("localhost","root","","webadit");

//menentukan nama file yang akan didownload
$file = $_GET['download'];

//mengambil data file dari database
$query = "SELECT * FROM rka WHERE file_rka = '$file'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$path = "/uploads/".$row['file_rka'];

//mengambil file dari folder
//$path = "uploads/".$file;

//mendownload file
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
