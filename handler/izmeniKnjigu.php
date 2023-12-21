<?php
require "../connection.php";
require "../modeli/Knjizara.php";

$id = trim($_POST['id']);
$naziv = trim($_POST['naziv']);
$autor = trim($_POST['autor']);
$cena = trim($_POST['cena']);
$userId = trim($_POST['userId']);

$knjizara = new Knjizara($id, $naziv, $autor, $cena, $userId);

$status = Knjizara::update($knjizara, $mysqli);

if ($status){
    echo 'Success';
}else{
    echo 'Failure';
}

header("Location: ../index.php");


?>