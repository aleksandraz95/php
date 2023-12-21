<?php
require "../connection.php";
require "../modeli/Knjizara.php";

$user = $_GET['user'];
$sortiranje = $_GET['sortiranje'];

$nizKnjiga = Knjizara::getAllSortedAndSearched($mysqli, $user, $sortiranje);

?>
<table id="myTable" class="table table-hover table-striped">
    <thead class="thead">
        <tr>
            <th scope="col">Naziv</th>
            <th scope="col">Autor</th>
            <th scope="col">Cena</th>
            <th scope="col">Prodavac</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($nizKnjiga as $knjizara) {
        ?>
            <tr>
                <td><?php echo $knjizara->naziv ?></td>
                <td><?php echo $knjizara->autor ?></td>
                <td><?php echo $knjizara->cena ?></td>
                <td><?php echo $knjizara->name ?></td>
                <td>
                    <a href='izmeni.php?id="<?php echo $knjizara->id ?>"'><button class="btn btn-info">Izmeni</button></a>
                    <a href='operacije/obrisiKnjigu.php?id="<?php echo $knjizara->id ?>"'><button class="btn btn-danger">Obriši</button></a>
                </td>

            </tr>

        <?php
        }
        ?>

    </tbody>
</table>