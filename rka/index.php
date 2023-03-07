<?php
include "../includes/header.php"; ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Halaman Ringkasan Rencana Kerja Anggaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">RKA</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <br>
            <div class="card-body">
            <h6> <a href="tambah_rka.php"class="btn btn-primary"><i class="bi bi-folder-plus me-1"></i> Tambah Data </a></h6>
            <br>
            
              <!-- Default Table -->
              <table class="table table-striped mt-6" id="tabel-data">
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
$data = mysqli_query($koneksi, "SELECT * FROM rka ORDER BY id_rka DESC");
while ($d = mysqli_fetch_array($data)) { 
?> 
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d["nama_file"]; ?></td>
        <td><?php echo $d["tanggal"]; ?></td>
        <td><?php echo $d["tanggungjawab"]; ?></td>
        <td><?php echo $d["bidang"]; ?></td>
        <td>
            <!-- Tombol edit -->
            <a href="edit_rka.php?hal=edit&id_rka=<?= $d["id_rka"] ?>" class="btn btn-success">
                <i class="bi bi bi-pencil-square"></i>
            </a>
            
            <!-- Tombol hapus -->
            <button type="button" class="btn btn-danger" onclick="hapusRKA(<?php echo $d['id_rka'] ?>)">
                <i class="bi bi-trash"></i>
            </button>

            <!-- Tombol download -->
            <a href="<?= $d['file_rka'] ?>"  class="btn btn-primary" download>
                <i class="bi bi-download"></i>
            </a>
        </td>
    </tr>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function hapusRKA(id) {
    Swal.fire({
        title: 'Apakah Anda yakin ingin menghapus data ini?',
        text: "Anda tidak akan dapat mengembalikan data yang sudah dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `hapus_rka.php?hal=hapus&id_rka=${id}`;
        }
    });
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