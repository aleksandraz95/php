<?php
include "connection.php";

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$sesql="select username from user where username='$user_check'";
$rez= $mysqli->query($sesql);
$red = $rez->fetch_object();

$login_session =$red->username;
if(!isset($login_session)){

header('Location: indexLog.php'); // Redirecting To Home Page
}
?>\