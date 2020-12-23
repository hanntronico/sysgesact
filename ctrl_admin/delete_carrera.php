<?php 
include ("conexion/config.php");
$idse=$_GET["dat"];
$rsh="UPDATE carreras SET estado_carrera=0 WHERE idcarrera=".$idse;

$linkdocu->query($rsh);
mysqli_close($linkdocu);
$mensaje="delete";

header("Location: carreras.php?var=$mensaje");

?>