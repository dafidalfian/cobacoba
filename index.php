<?php
include "databases.php";

$daftar_mhs = daftar_data("SELECT *FROM daftar_mahasiswa");

function cari($oke){
	$query = "SELECT *FROM daftar_mahasiswa WHERE 
	Nama LIKE '%$oke%' OR
	Nim LIKE '%$oke%' OR
	Email LIKE '%$oke%' OR
	Jurusan LIKE '%$oke%'
	";

	return daftar_data($query);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
	<style></style>
</head>
<body>
	<a href="tambah.php" target="_blank" style="font-size: 20px;">Tambah daftar</a>
	<?php
	if(isset($_POST["submit"])){
	$daftar_mhs = cari($_POST["oke"]);
	echo "<script>alert('berhasil ');</script>";
}
?>
	<form method="post">
		<input type="text" name="oke" autofocus="on" autocomplete="off" style="width: 20%; height: 20px" placeholder="Cari daftar nama disini. . . . . . . . . .">
		<button type="submit" name="submit" style="height: 30px">Search</button>
	</form>
	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>No</th>
			<th>Nim</th>
			<th>Nama</th>
			<th>Email</th>
			<th>No Telp</th>
			<th>Jurusan</th>
			<th>Gambar</th>
			<th>Pilih</th>
		</tr>
		<?php $i=1;?>
		<?php foreach($daftar_mhs as $query):?>
		<tr>
			<td><?= $i;?></td>
			<td><?php echo $query["Nim"];?></td>
			<td><?php echo $query["Nama"];?></td>
			<td><?php echo $query["Email"];?></td>
			<td><?php echo $query["NoTelp"];?></td>
			<td><?php echo $query["Jurusan"];?></td>
			<td><img src="img/<?php echo $query["Gambar"];?>" width="150px" height="150px"></td>
			<td>
				<a href="edit.php?id=<?php echo $query["id"];?>">Edit</a> | | 
				<a href="hapus.php?id=<?php echo $query["id"];?>" onclick="return confirm('Yakin Ingin Menghapus')";>Delete</a> | | 
				<a href="profile.php?id=<?php echo $query["id"];?>">Cek Profile</a>
			</td>
			<?php $i++;?>
		</tr>
	<?php endforeach;?>
	</table>

</body>
</html>