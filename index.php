<?php
require "connection.php";
require "modeli/Knjizara.php";

session_start();

$poruka = "";

if (isset($_GET['poruka'])) {
    $poruka = $_GET['poruka'];
}

$rezultat = Knjizara::getAll($mysqli);


if (!$rezultat) {
    echo "Greška";
    die();
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

        <?php
        if ($poruka != "") {
        ?>

            <div class="alert alert-info" role="alert">
                <?= $poruka ?>
            </div>
        <?php
        }
        ?>

        <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#dodajKnjiguModal">
            Dodaj knjigu
        </button>
    </div>

    <div class="container">
        <div id="pregled" class="panel panel-success">

            <div class="row">
                <div class="col-md-6">
                    <label for="userPretraga" class="form-label"> Pretraži po prodavcu </label>
                    <select id="userPretraga" name="userPretraga" class="form-control">

                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sortiranje" class="form-label"> Sortiraj po ceni </label>
                    <select id="sortiranje" name="sortiranje" class="form-control">
                        <option value="asc">Rastuće</option>
                        <option value="desc">Opadajuće</option>
                    </select>
                </div>

                <hr>
                <div class="col-md-12">
                    <button id="dugme" type="button" onclick="pretrazi()" class="btn btn-primary">Pretraži</button>
                </div>
            </div>

            <hr>
            <div class="col-md-12 panel-body" id="rezultat">

            </div>
        </div>

        <!-- Modal za dodavanje novih knjiga -->
        <div class="modal fade" id="dodajKnjiguModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="novaKnjiga">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Nova knjiga</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="naziv" class="form-label"> Naziv </label>
                                <input type="text" class="form-control" name="naziv">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="autor" class="form-label"> Autor </label>
                                <input type="text" class="form-control" name="autor">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="cena" class="form-label"> Cena </label>
                                <input type="text" class="form-control" name="cena">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="userId" class="form-label"> Prodavac </label>
                                <select id="userId" name="userId" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="novaKnjiga">Sačuvaj</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                        </div>
                    </form>
                </div>
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