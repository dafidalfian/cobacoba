<?php
if(isset($_GET["submit"])){
	if($_GET["nama"]=="dafid"&&$_GET["pass"]=="123"){
		header("Location:index.php");
	} else {
		$error = true;
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Login System</title>
</head>
<body>
	<?php if(isset($error)): ?>
	<h2 style="color: red"> Salah bosss</h2>
<?php endif; ?>
	<form method="get">
		<input type="name" name="nama"><br>
		<input type="password" name="pass"><br>
		<button type="submit" name="submit">Login</button>
	</form>

</body>
</html>