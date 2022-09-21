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
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->


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