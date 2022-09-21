<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{ 
header("Location: indexLog.php"); // Redirecting To Home Page
}
?>