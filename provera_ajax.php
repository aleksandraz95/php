<?php
if (!isset ($_GET["id"])){
echo "Parametar Naziv nije prosleđen!";
} else {
$id=$_GET["id"];
include "connection.php";

$sql="SELECT * FROM knjizara WHERE id='".$id."'";
$rezultat = $mysqli->query($sql);
if ($rezultat->num_rows!=0){
echo "0";
} else {
echo "1";
}
$mysqli->close();
}
?>