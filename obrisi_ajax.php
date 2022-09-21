<?php
if (!isset ($_GET["id"])){
echo "Parametar Id nije prosleđen!";
} else {
$id=$_GET["id"]; 
include "connection.php";
$sql="DELETE FROM knjizara WHERE id='".$id."'";
if ($rezultat = $mysqli->query($sql)){
echo "1";
}
$mysqli->close();
}
?>
