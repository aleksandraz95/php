<?php
    require "../connection.php";
    require "../modeli/Knjizara.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $status = Knjizara::deleteByRB($id, $mysqli);


        if ($status){
            echo 'Success';
        }else{
            echo 'Failure';
        }
    }

    header("Location: ../index.php")
?>