<?php
$db = mysqli_connect("myprojek.com","root","","myprojek");
if(!$db){
	die('Gagal terhubung bos');
}

function daftar_data($query){
	global $db;
	$data = mysqli_query($db, $query);
	$rows = [];	
	while($row = mysqli_fetch_assoc($data)){
		$rows[] = $row;
	}
	return $rows;
}


function upload(){
	$namaFile = $_FILES["Gambar"]["name"];
	$ukuranFile = $_FILES["Gambar"]["size"];
	$error = $_FILES["Gambar"]["error"];
	$tmpName = $_FILES["Gambar"]["tmp_name"];

	// cek apakah tidak ada gambar yang di upload

	if($error === 4){
		echo "<script>alert('tidak ada gambar yang di upload');</script>";

	}

		// cek apakah yang di upload adalah gambar
	$ektensiGambarValid = ['jpg','jpeg','png'];
	$extensiGambar = explode('.', $namaFile);
	$extensiGambar = strtolower(end($extensiGambar));
	if(!in_array($extensiGambar, $ektensiGambarValid)) {
		echo "<script> alert('Yang anda upload bukanlah gambar');
		</script>";
		return false;
	}

	// cek ukuran gambar yang di upload
	if($ukuranFile > 1000000){
		echo "<script>alert('Ukuran gambar terlalu besar');
		</script>";
		return false;
	}
}
