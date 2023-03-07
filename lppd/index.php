<?php
include "../includes/header.php"; ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Halaman Laporan Penyelenggaraan Pemerintahan Daerah kepada Pemerintah</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">LPPD</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
          <br>
            <div class="card-body">
            <h6> <a href="tambah_lppd.php"class="btn btn-primary"><i class="bi bi-folder-plus me-1"></i> Tambah Data </a></h6>
            <br>
              <!-- Default Table -->
              <table class="table table-striped mt-3" id="tabel-data">
        <thead>
            <tr>
                        <th scope="col"> NO.</th>
                        <th scope="col">Nama File</th>
                        <th scope="col">Tanggal</th>
                        <th scope="colspan-2">Tanggung Jawab</th>
                        <th scope="colspan-2">Bidang</th>
                        <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
          include "../config/koneksi.php";
$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM lppd ORDER BY id_lppd DESC");
while ($d = mysqli_fetch_array($data)) { 
?> 
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $d["nama_file"] ?></td>
        <td><?= $d["tanggal"] ?></td>
        <td><?= $d["tanggungjawab"] ?></td>
        <td><?= $d["bidang"] ?></td>
        <td>
            <!-- Tombol edit -->
            <a href="edit_lppd.php?hal=edit&id_lppd=<?= $d["id_lppd"] ?>" class="btn btn-success">
                <i class="bi bi-pencil-square"></i>
            </a>
            <!-- Tombol hapus -->
            <button type="button" class="btn btn-danger" onclick="hapusLppd('<?= $d["id_lppd"] ?>')">
                <i class="bi bi-trash"></i>
            </button>
            <!-- Tombol download -->
            <a href="<?= $d['file_lppd'] ?>"  class="btn btn-primary" download>
                <i class="bi bi-download"></i>
            </a>
        </td>
    </tr>
<?php } ?>

<!-- Tambahkan script berikut di bawah kodingan tampilan tabel -->
<script>
function hapusLppd(id_lppd) {
    Swal.fire({
        title: 'Apakah Anda yakin ingin menghapus data ini?',
        showCancelButton: true,
        confirmButtonText: `Ya`,
    }).then((result) => {
        /* Jika tombol "Ya" diklik, redirect ke halaman hapus_lppd.php */
        if (result.isConfirmed) {
            window.location.href = `hapus_lppd.php?hal=hapus&id_lppd=${id_lppd}`;
        }
    })
}
</script>


          </tbody>
          <script type="text/javascript">
          $(document).ready(function(){
            $('#tabel-data').DataTable();
          });
        </script>
          </table>
              <!-- End Default Table Example -->

              <?php

include "../includes/footer.php"; ?>