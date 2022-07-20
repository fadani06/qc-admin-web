<?php 
// mengaktifkan session pada php
session_start();


$koneksi = mysqli_connect("sql102.epizy.com","epiz_31881190","0EKpAYcdsHMO1T","epiz_31881190_db_qc");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 


// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM users WHERE username = '$username' and password = '$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai administrator
	if($data['level']=="administrator"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "administrator";
		// alihkan ke halaman dashboard administrator
		header("location:produk/index.php");

	// cek jika user login sebagai user
	}else if($data['level']=="user"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user";
		// alihkan ke halaman dashboard user
		header("location:userPage/produk/index.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}

?>