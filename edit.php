<?php
include "databases.php";
$id = $_GET["id"];
$data = mysqli_query($db, "SELECT *FROM daftar_mahasiswa WHERE id = $id");
if(isset($_POST["submit"])){
	$nim = $_POST["Nim"];
	$nama = $_POST["Nama"];
	$notelp = $_POST["NoTelp"];
	$email = $_POST["Email"];
	$jurusan = $_POST["Jurusan"];
	$gambar = $_POST["Gambar"];

	$data1 = "UPDATE daftar_mahasiswa SET nim = '$nim',nama = '$nama',notelp = '$notelp',email = '$email',jurusan = '$jurusan',gambar = '$gambar' WHERE id = $id ";
	$masuk = mysqli_query($db, $data1);
	if(mysqli_affected_rows($db)>0){
		echo "<script>alert('Berhasil Mengedit  Data');
		document.location.href='index.php';
		</script>";
	} else {
		echo "<script>alert('Data Gagal Di edit');
		document.location.href='index.php';
		</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
</head>
<body>
	<h3>Edit Data</h3>
	<form method="post">
		<?php while($row = mysqli_fetch_row($data)):?>
		<th>Nim</th><br><input type="text" name="Nim" value="<?php echo $row[1]; ?>"><br>
		<th>Nama</th><br><input type="text" name="Nama" value="<?php echo $row[2];?>"><br>
		<th>Email</th><br><input type="email" name="Email" value="<?php echo $row[3];?>"><br>
		<th>NoTelp</th><br><input type="text" name="NoTelp" value="<?php echo $row[4];?>"><br>
		<th>Jurusan</th><br><input type="text" name="Jurusan" value="<?php echo $row[5];?>"><br>
		<th>Gambar</th><br><img src="img/<?php echo $row[6];?>" width="100px" height="100px"><br>
		<input type="file" name="Gambar"><br>
		<button type="submit" name="submit" onclick="return confirm('Yakin ingin edit?');">Selesai !!!</button>
	<?php endwhile;?>
	</form>

</body>
</html>