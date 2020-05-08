<?php
include "databases.php";
if(isset($_POST["submit"])){
	$nim = $_POST["Nim"];
	$nama = $_POST["Nama"];
	$email = $_POST["Email"];
	$notelp = $_POST["NoTelp"];
	$jurusan = $_POST["Jurusan"];

	// upload gambar
	$gambar = upload();
	if(!$gambar){
		return false;
	}
	$masuk = "INSERT INTO daftar_mahasiswa VALUES('','$nim','$nama','$email','$notelp','$jurusan','$gambar')";
	$masuk_data = mysqli_query($db, $masuk);
	
	if(mysqli_affected_rows($db)>0){
		echo "<script>alert('Berhasil Menambah Data');
		document.location.href='index.php';
		</script>";
	} else {
		echo "<script>alert('Gagal Menambah Data');</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
</head>
<body>
	<h3>Tambah Data</h3>
	<form method="post" enctype="multipart/form-data" >
		<th>Nama</th><br><input type=""text name="Nama"><br>
		<th>Nim</th><br><input type="text" name="Nim"><br>
		<th>Email</th><br><input type="email" name="Email"><br>
		<th>No Telp</th><br><input type="text" name="NoTelp"><br>
		<th>Jurusan</th><br><input type="text" name="Jurusan"><br>
		<th>Pilih Foto </th><input type="file" name="Gambar"><br><br>
		<button type="submit" name="submit">Tambah!</button>
	</form>

</body>
</html>