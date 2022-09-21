<?php 
$kon_server="localhost";
$kon_user="root";
$kon_password="";
$kon_base="database";

$mysqli= new mysqli($kon_server,$kon_user,$kon_password,$kon_base);
if ($mysqli->connect_errno) {

    printf("Konekcija je neuspešna: %s\n", $mysqli->connect_error);
    exit();
}

$mysqli->set_charset("utf8");

?>