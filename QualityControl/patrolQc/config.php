<?php

// Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "db_qc");
$no = 0;

//Fungsi Lihat Data
function query ($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}

	return $rows;
}

//Fungsi Tambah Data

function tambah ($data) {
	global $conn;

	$id_Produk  = htmlspecialchars($data["id_Produk"]);
	$tgl_check  = htmlspecialchars($data["tgl_check"]);
	$shift 		= htmlspecialchars($data["shift"]); 
	$pic 		= htmlspecialchars($data["pic"]); 
	$area 		= htmlspecialchars($data["area"]);
	$eq_cek 	= htmlspecialchars($data["eq_cek"]); 
	$problem 	= htmlspecialchars($data["problem"]);
	$tgl_pro 	= htmlspecialchars($data["tgl_pro"]);
	$shift_pro 	= htmlspecialchars($data["shift_pro"]);
	$ket_prob 	= htmlspecialchars($data["ket_prob"]);
	$qty_cek 	= htmlspecialchars($data["qty_cek"]);
	$qty_prob 	= htmlspecialchars($data["qty_prob"]);
	$act 		= htmlspecialchars($data["act"]);
	$stat		= htmlspecialchars($data["stat"]);
	$ket_stat 	= htmlspecialchars($data["ket_stat"]);
	$tgl_close 	= htmlspecialchars($data["tgl_close"]);

	// Upload Foto 1 //
	$foto_prob = upload();
	if (!$foto_prob) {
		return false;
	}

	// Upload Foto 2 //
	$foto_act = upload2();
	if (!$foto_act) {
		return false;
	}

	$query = "INSERT INTO patrol_qc VALUES (
	'',
	'$id_Produk',
	'$tgl_check',
	'$shift',
	'$pic',
	'$area',
	'$eq_cek',
	'$problem',
	'$tgl_pro',
	'$shift_pro',
	'$ket_prob',
	'$qty_cek',
	'$qty_prob',
	'$act',
	'$stat',
	'$ket_stat',
	'$tgl_close',
	'$foto_prob', 
	'$foto_act')";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {

	// Foto Problem //
	$namaFiles 		= $_FILES['foto_prob']['name'];
	$ukuranFiles 	= $_FILES['foto_prob']['size'];
	$error 			= $_FILES['foto_prob']['error'];
	$tmpName		= $_FILES['foto_prob']['tmp_name'];

	// Cek apakah ada gambar yang diupload //

	if ($error === 4) {
		echo "<script>alert('Foto Problem Tidak Ada!!')</script>";
		return false;
	}

	// Cek Ekstensi Gambar sesuai atau tidak //
	$eksValid = ['jpg', 'jpeg', 'png'];
	$eksfoto = explode('.', $namaFiles);
	$eksfoto = strtolower(end($eksfoto));
	if (!in_array($eksfoto, $eksValid)) {

		echo "<script>alert('Ekstensi foto problem tidak sesuai!!')</script>";
		return false;

	}

	 // Cek Ukuran Gambar yang diupload sesuai atau tidak //
	if ($ukuranFiles > 5000000 ) {
		echo "<script>alert('Size foto problem terlalu besar!!')</script>";
		return false;
	}

	 // Gambar yang lolos pengecekan //

	 // Generate Nama Baru //
	$namaFilesBaru = uniqid();
	$namaFilesBaru .= '.';
	$namaFilesBaru .= $eksfoto;

	move_uploaded_file($tmpName, '../img/patrolQC/fotoProb/'. $namaFilesBaru);

	return $namaFilesBaru;

}

function upload2() {

	// Foto Problem //
	$namaFiles2 	= $_FILES['foto_act']['name'];
	$ukuranFiles2 	= $_FILES['foto_act']['size'];
	$error2			= $_FILES['foto_act']['error'];
	$tmpName2		= $_FILES['foto_act']['tmp_name'];

	// Cek apakah ada gambar yang diupload //

	if ($error2 === 4) {
		echo "<script>alert('Foto Problem Tidak Ada!!')</script>";
		return false;
	}

	// Cek Ekstensi Gambar sesuai atau tidak //
	$eksValid2 = ['jpg', 'jpeg', 'png'];
	$eksfoto2 = explode('.', $namaFiles2);
	$eksfoto2 = strtolower(end($eksfoto2));
	if (!in_array($eksfoto2, $eksValid2)) {

		echo "<script>alert('Ekstensi foto problem tidak sesuai!!')</script>";
		return false;

	}

	 // Cek Ukuran Gambar yang diupload sesuai atau tidak //
	if ($ukuranFiles2 > 5000000 ) {
		echo "<script>alert('Size foto problem terlalu besar!!')</script>";
		return false;
	}


	 // Gambar yang lolos pengecekan //
	 // Generate Nama Baru //
	$namaFilesBaru2 = uniqid();
	$namaFilesBaru2 .= '.';
	$namaFilesBaru2 .=$eksfoto2;

	move_uploaded_file($tmpName2, '../img/patrolQC/fotoAct/'. $namaFilesBaru2);

	return $namaFilesBaru2;

}

//Fungsi Hapus Data
function hapus($id_PatrolQc) {
	global $conn;
	mysqli_query($conn, "DELETE FROM patrol_qc WHERE id_PatrolQc = $id_PatrolQc");

	return mysqli_affected_rows($conn);

}


//Fungsi Ubah Data
function ubah($data){
	global $conn;

	$id_PatrolQc	= $data["id_PatrolQc"];
	$shift 			= htmlspecialchars($data["shift"]); 
	$pic 			= htmlspecialchars($data["pic"]); 
	$area 			= htmlspecialchars($data["area"]);
	$eq_cek 		= htmlspecialchars($data["eq_cek"]); 
	$problem 		= htmlspecialchars($data["problem"]);
	$tgl_pro 		= htmlspecialchars($data["tgl_pro"]);
	$shift_pro 		= htmlspecialchars($data["shift_pro"]);
	$ket_prob 		= htmlspecialchars($data["ket_prob"]);
	$qty_cek 		= htmlspecialchars($data["qty_cek"]);
	$qty_prob 		= htmlspecialchars($data["qty_prob"]);
	$act 			= htmlspecialchars($data["act"]);
	$stat 			= htmlspecialchars($data["stat"]);
	$ket_stat 		= htmlspecialchars($data["ket_stat"]);
	$tgl_close 		= htmlspecialchars($data["tgl_close"]);
	$fotoProb2 		= htmlspecialchars($data["fotoProb2"]);
	$fotoAct2 		= htmlspecialchars($data["fotoAct2"]);

	if ($_FILES['foto_prob']['error'] === 4) {
		$foto_prob = $fotoProb2;
	} else {
		$foto_prob = upload();
	}

	if ($_FILES['foto_act']['error'] === 4) {
		$foto_act = $fotoAct2;
	} else {
		$foto_act = upload2();
	}
	

	$query = "UPDATE patrol_qc SET

	shift 		= '$shift',
	pic 		= '$pic',
	area 		= '$area',
	eq_cek 		= '$eq_cek',
	problem 	= '$problem',
	tgl_pro 	= '$tgl_pro',
	shift_pro	= '$shift_pro',
	ket_prob 	= '$ket_prob',
	qty_cek 	= '$qty_cek',
	qty_prob 	= '$qty_prob',
	act 		= '$act',
	stat 		= '$stat',
	ket_stat 	= '$ket_stat',
	tgl_close 	= '$tgl_close',
	foto_prob 	= '$foto_prob',
	foto_act 	= '$foto_act'

	WHERE id_PatrolQc = $id_PatrolQc";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


//Function Cari

function cari($keyword) {
	$query = "SELECT * FROM patrol_qc 
	WHERE 
	tgl_check LIKE '%$keyword%' OR 
	pic LIKE '%$keyword%'  OR 
	shift LIKE '%$keyword%' OR
	area LIKE '%$keyword%' OR
	part_num LIKE '%$keyword%' OR
	problem LIKE '%$keyword%'

	";

	return query ($query);

}


?>