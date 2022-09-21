<?php
include "connection.php";
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Pogrešno korisničko ime ili lozinka";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);


// SQL query to fetch information of registerd users and finds user match.
$query = "select * from user where password='$password' AND username='$username'";
$rezultat = $mysqli->query($query);

if ($rezultat == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: index.php"); // Redirecting To Other Page
} else {
$error = "Pogrešno korisničko ime ili lozinka";
}

}
}
?>