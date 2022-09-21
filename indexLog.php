<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-Language" content="sr"/>
<meta http-equiv="content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style2.css">



<title>e-Knjižara | Prijava</title>

</head>
<body>
<div id="main">
	<h1>e-Knjižara (pristup imaju samo zaposleni)</h1>
	<div id="login">
		<h2>Unesite podatke za prijavu</h2>
		
		<form action="" method="post" >
			<label>Korisničko ime:</label>
			<input id="name" name="username" type="text">
			<label>Lozinka:</label>
			<input id="password" name="password" type="password">
			<input name="submit" type="submit" value=" Prijava ">
			<span><?php echo $error; ?></span>
		</form>
		
	</div>
</div>
</body>
</html>