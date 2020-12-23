<?php 
include ("conexion/config.php");
$idse=$_GET["dat"];
// idtipo_grado, tipogrado, descrip_tipogr, estado_tipogr
$rsh="UPDATE tipo_grado SET estado_tipogr=0 WHERE idtipo_grado=".$idse;

$linkdocu->query($rsh);
mysqli_close($linkdocu);
$mensaje="delete";

header("Location: tipos_grado.php?var=$mensaje");

?>