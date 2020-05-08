<?php
include "databases.php";

$id = $_GET["id"];
$hapus = "DELETE FROM daftar_mahasiswa WHERE id = $id";
$hapus1 = mysqli_query($db, $hapus);

if(mysqli_affected_rows($db)>0){
	echo "<script>alert('Berhasil Menghapus Data');
			document.location.href='index.php';
			</script>";
} else{
	echo "<script>alert('Gagal Menghapus Data');</script>";
}