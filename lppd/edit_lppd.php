<?php
ob_start();
include "../includes/header.php";
include "../config/koneksi.php";
$id_lppd = $_GET["id_lppd"];
$ambildata = mysqli_query(
    $koneksi,
    "SELECT * FROM lppd WHERE id_lppd='$id_lppd'"
);
$data = mysqli_fetch_array($ambildata);
?>
          ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Tambah Data Arsip</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">LPPD</li>
      <li class="breadcrumb-item active">Tambah Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">
    <div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
  Perhatikan tanggal dan nama file !!
  </div>
</div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <!-- Horizontal Form -->
          <form action="" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama File</label>
              <div class="col-sm-10">
                <input type="text" name="nama_file" class="form-control" id="nama_file" value="<?php echo $data[
                                "nama_file"
                            ]; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
              <div class="col-sm-10">
                <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $data[
                                "tanggal"
                            ]; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Pengampu</label>
              <div class="col-sm-10">
                <input type="text" name="tanggungjawab" id="tanggungjawab" class="form-control" value="<?php echo $data[
                                "tanggungjawab"
                            ]; ?>">
              </div>
            </div>

            <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Bidang</label>
                  <div class="col-sm-10">
                    <select class="form-select" id="bidang" name="bidang" aria-label="Default select example" value="<?php echo $data[
                                "bidang"
                            ]; ?>">
                      <option selected>Silahkan Pilih Bidang Ini</option>
                      <option value="koperasi">Koperasi</option>
                      <option value="industri">Industri</option>
                      <option value="perdagangan">Perdagangan</option>
                      <option value="umkm">Umkm</option>
                    </select>
                  </div>
                </div>
           
            <div class="text-center">
              <button type="submit" name="submit" value="submit" class="btn btn-primary" value="Tambahkan">Tambah</button>
            </div>
          </form><!-- End Horizontal Form -->

          <?php if (isset($_POST["submit"])) {
                          $nama_file = $_POST["nama_file"];
                          $tanggal = $_POST["tanggal"];
                          $tanggungjawab = $_POST["tanggungjawab"];
                          $bidang = $_POST["bidang"];

                          $query = "UPDATE lppd SET nama_file ='$nama_file', tanggal='$tanggal', tanggungjawab ='$tanggungjawab', bidang='$bidang' WHERE id_lppd = '$id_lppd'";
                          ($query_run = mysqli_query($koneksi, $query)) or
                              die(mysqli_error($koneksi));

                          if ($query_run) {
                              header("location:index.php");
                          } else {
                              echo '<script>alert("Gagal"); </script>';
                          }
                      } ?>


              <?php
include "../includes/footer.php"; ?>