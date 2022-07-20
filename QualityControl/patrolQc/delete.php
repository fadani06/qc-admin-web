<?php 

session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../index.php?pesan=gagal");
}

require 'config.php';

$id_PatrolQc = $_GET["id_PatrolQc"];

if(hapus($id_PatrolQc) > 0) {
	echo "
	<script>
	alert('Data berhasil dihapus!');
	document.location.href = 'index.php';
	</script>
	";
} else {
	echo "
	<script>
	alert('Data gagal dihapus!');
	document.location.href = 'index.php';
	</script>
	";
}
?>