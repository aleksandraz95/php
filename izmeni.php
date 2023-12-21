<?php
require "connection.php";
require "modeli/Knjizara.php";

session_start();

$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: index.php?poruka=Id za izmenu nije postavljen");
}

$knjizara = Knjizara::getOne($id, $mysqli);

if ($knjizara != null) {
    $id = $_GET['id'];
} else {
    header("Location: index.php?poruka=Nije pronadjena knjiga po id-u " . $id);
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> e-Knjižara </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container my-3">
        <h1 class="text-center"> e-Knjižara </h1>
    </div>

    <div class="container">
        <div class="row">
            <form method="post" id="izmenaKnjige" action="operacije/izmeniKnjigu.php">
                <input type="hidden" value="<?= $knjizara->id ?>" name="id">
                <div class="col-md-12">
                    <label for="naziv" class="form-label"> Naziv </label>
                    <input type="text" value="<?= $knjizara->naziv ?>" class="form-control" name="naziv">
                </div>
                <div class="col-md-12">
                    <label for="autor" class="form-label"> Autor </label>
                    <input type="text" value="<?= $knjizara->autor ?>" class="form-control" name="autor">
                </div>
                <div class="col-md-12">
                    <label for="cena" class="form-label"> Cena </label>
                    <input type="text" value="<?= $knjizara->cena ?>" class="form-control" name="cena">
                </div>
                <div class="col-md-12">
                    <label for="userId_izmena" class="form-label"> Prodavac </label>
                    <select id="userId_izmena" name="userId" class="form-control">

                    </select>
                </div>
                <hr>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="izmenaKnjige">Sačuvaj izmene</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <script>
        function selectUser() {
            $.ajax({
                url: 'operacije/selectUser.php',
                success: function(data) {
                    $("#userId").html(data);
                    $("#userId_izmena").html(data);
                    let dodatniPodaci = '<option value="0"> Svi prodavci</option>' + data;

                    $("#userPretraga").html(dodatniPodaci);
                    pretrazi();
                }
            });
        }

        selectUser();

        function pretrazi() {
            let user = $("#userPretraga").val();
            let sortiranje = $("#sortiranje").val();

            $.ajax({
                url: 'operacije/pretrazi.php',
                data: {
                    user: user,
                    sortiranje: sortiranje
                },
                success: function(data) {
                    $("#rezultat").html(data);
                }
            });
        }
    </script>

</body>

</html>