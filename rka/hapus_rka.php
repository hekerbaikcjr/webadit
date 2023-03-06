<?php
session_start();
include '../config/koneksi.php';
if(isset($_GET['id_rka'])) {
    $delete = mysqli_real_escape_string($koneksi, $_GET['id_rka']);
    $query = "DELETE FROM rka WHERE id_rka ='$delete'";
    $query_run = mysqli_query($koneksi, $query);

    if($query_run) {
        echo "
		<script>
			alert('Data RKA berhasil dihapus!');
			document.location.href = 'index.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Data RKA gagal dihapus!');
			document.location.href = 'index.php';
		</script>

	";
}
}