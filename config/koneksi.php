<?php
$koneksi = mysqli_connect("localhost", "root", "", "webadit");
if(mysqli_connect_errno()) {
    echo "Koneksi gagal : " . mysqli_connect_errno() ;
}
?>