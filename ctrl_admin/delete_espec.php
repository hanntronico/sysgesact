<?php 
include ("conexion/config.php");
$idse=$_GET["dat"];

$rsh="UPDATE especialidades SET estado_esp=0 WHERE idespecialidad=".$idse;

$linkdocu->query($rsh);
mysqli_close($linkdocu);
$mensaje="delete";

header("Location: especialidades.php?var=$mensaje");

?>