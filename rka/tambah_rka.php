<?php
include "../includes/header.php"; ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Tambah Data Arsip</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">RKA</li>
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
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama File</label>
              <div class="col-sm-10">
                <input type="text" name="nama_file" class="form-control" id="nama_file" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
              <div class="col-sm-10">
                <input type="date" name="tanggal" class="form-control" id="tanggal" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Pengampu</label>
              <div class="col-sm-10">
                <input type="text" name="tanggungjawab" class="form-control" id="tanggungjawab" required>
              </div>
            </div>

            <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Bidang</label>
                  <div class="col-sm-10">
                    <select class="form-select" id="bidang" name="bidang" aria-label="Default select example" required>
                      <option selected>Silahkan Pilih Bidang Ini</option>
                      <option value="koperasi">Koperasi</option>
                      <option value="industri">Industri</option>
                      <option value="perdagangan">Perdagangan</option>
                      <option value="umkm">Umkm</option>
                    </select>
                  </div>
                </div>
          
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">File</label>
              <div class="col-sm-10">
                <input type="file" name="file_lppd" class="form-control" id="file_lppd" required>
              </div>
            </div>
          
           
            <div class="text-center">
              <button type="submit" name="submit" class="btn btn-primary" value="Tambahkan">Tambah</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End Horizontal Form -->


          <?php
if (isset($_POST['submit'])) {
  // Mengambil nilai form
  $nama_file = $_POST['nama_file'];
  $tanggal = $_POST['tanggal'];
  $tanggungjawab = $_POST['tanggungjawab'];
  $bidang = $_POST['bidang'];

  $file_name = $_FILES['file_lppd']['name'];
  $file_tmp = $_FILES['file_lppd']['tmp_name'];
  $file_type = $_FILES['file_lppd']['type'];
  $file_size = $_FILES['file_lppd']['size'];


  $target_dir = "uploads/";
  $target_file = $target_dir . basename($file_name);

  $valid_types = array("pdf");
  $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if (!in_array($file_extension, $valid_types)) {
    echo "Error: File yang diupload harus berupa PDF!";
    exit();
  }

  if ($file_size > 5000000) {
    echo "Error: Ukuran file terlalu besar!";
    exit();
  }

  move_uploaded_file($file_tmp, $target_file);

  $koneksi = new mysqli("localhost", "root", "", "webadit");
  $sql = "INSERT INTO rka (nama_file, tanggal, tanggungjawab, file_rka, bidang) VALUES ('$nama_file', '$tanggal', '$tanggungjawab','$target_file', '$bidang')";
  if ($koneksi->query($sql) === TRUE) {
    echo "<script>
    Swal.fire({title: 'Tambah Data LPPD Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php';
        }
    })</script>";
  } else {
      echo "<script>
    Swal.fire({title: 'Tambah Data LPPD Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        window.location = 'index.php';
        }
    })</script>";
  $koneksi->close();
  }
}
?>
          

              <?php
include "../includes/footer.php"; ?>