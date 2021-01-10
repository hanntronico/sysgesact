<?php 
include ("conexion/config.php");
$idse=$_GET["dat"];
$idcontrol = $_GET["idcontrol"];
// $rsh="UPDATE control_activ SET estado_carrera=0 WHERE idcarrera=".$idse;
$rsh="DELETE FROM detalle_actividades WHERE detalle_actividades.idactividad =".$idse;
$linkdocu->query($rsh);
mysqli_close($linkdocu);

$rsh="DELETE FROM `actividades` WHERE idactividad=".$idse;
$linkdocu->query($rsh);
mysqli_close($linkdocu);
$mensaje="delete";

header("Location: asignar_actividades.php?dat=".$idcontrol."&var=$mensaje");

?>