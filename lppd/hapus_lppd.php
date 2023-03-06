<?php
session_start();
include '../config/koneksi.php';
if(isset($_GET['id_lppd'])) {
    $delete = mysqli_real_escape_string($koneksi, $_GET['id_lppd']);
    $query = "DELETE FROM lppd WHERE id_lppd ='$delete'";
    $query_run = mysqli_query($koneksi, $query);

    if($query_run) {
        echo "
		<script>
			alert('Data lppd berhasil dihapus!');
			document.location.href = 'index.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Data lppd gagal dihapus!');
			document.location.href = 'index.php';
		</script>

	";
}
}

?>