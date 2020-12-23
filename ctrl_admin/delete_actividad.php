<?php 
include ("conexion/config.php");
$idse=$_GET["dat"];
// $rsh="UPDATE control_activ SET estado_carrera=0 WHERE idcarrera=".$idse;
$rsh="DELETE FROM `actividades` WHERE idactividad=".$idse;

$linkdocu->query($rsh);
mysqli_close($linkdocu);
$mensaje="delete";

header("Location: asignar_actividades.php?var=$mensaje");

?>