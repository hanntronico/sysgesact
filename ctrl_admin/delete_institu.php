<?php 
include ("conexion/config.php");
$idse=$_GET["dat"];

// idinstitucion, institucion, desc_inst, estado_institu

$rsh="UPDATE instituciones SET estado_institu=0 WHERE idinstitucion=".$idse;

$linkdocu->query($rsh);
mysqli_close($linkdocu);
$mensaje="delete";

header("Location: instituciones.php?var=$mensaje");

?>