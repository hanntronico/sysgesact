<?php 
include ("conexion/config.php");
$idse=$_GET["dat"];
$rsh="UPDATE egresados SET estado=0 WHERE idegresado=".$idse;

$linkdocu->query($rsh);
mysqli_close($linkdocu);
$mensaje="delete";

header("Location: egresados.php?var=$mensaje");

?>