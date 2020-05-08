<?php
include "databases.php";
$id = $_GET["id"];
$tampil = daftar_data("SELECT *FROM daftar_mahasiswa WHERE id = '$id' ");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile Pribadi</title>
	<style>
	.text1{
	writing-mode: tb-rl;
	-webkit-transform:rotate(-90deg);
	-moz-transform:rotate(-90deg);
	-o-transform:rotate(-90deg);
	-ms-transform:rotate(-90deg);
	transform:rotate(180deg);
	white-space: nowrap;
	float: left;
}
	</style>
</head>
<body>
	<h3>Data Profile</h3>
	<table border="1" cellspacing="0" cellpadding="10">
		<?php foreach($tampil as $row):?>
		<th colspan="7"><img src="img/<?php echo$row["Gambar"];?>" width="200px" height="200px"></th>
		<tr>
			<td rowspan="6"><h3 class="text1">Data</h3></td>
		</tr>
		<tr>
			<td>Nim</td><td><?php echo $row["Nim"];?></td>
		</tr>
		<tr>
			<td>Nama</td><td><?php echo$row["Nama"];?></td>
		</tr>
		<tr>
			<td>Email</td><td><?php echo$row["Email"];?></td>
		</tr>
		<tr>
			<td>NoTelp</td><td><?php echo$row["NoTelp"];?></td>
		</tr>
		<tr>
			<td>Jurusan</td><td><?php echo$row["Jurusan"];?></td>
		</tr>
	<?php endforeach;?>
	</table>

</body>
</html>