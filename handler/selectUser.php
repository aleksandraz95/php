<?php
require "../connection.php";
require "../modeli/User.php";

$nizUser = User::getAll($mysqli);

foreach ($nizUser as $user){
    ?>

    <option value="<?= $user->userId ?>"><?= $user->name ?></option>

<?php
}
?>