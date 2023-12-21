<?php
require "../connection.php";
require "../modeli/Knjizara.php";

if(isset($_POST['naziv']) && isset($_POST['autor']) 
    && isset($_POST['cena']) && isset($_POST['userId'])){
        $knjizara = new Knjizara(null, $_POST['naziv'], $_POST['autor'], $_POST['cena'], $_POST['userId']);

        $status = Knjizara::add($knjizara, $mysqli);

        if ($status){
            echo 'Success';
        }else{
            echo 'Failure';
        }
    }
?>
