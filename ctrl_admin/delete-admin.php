<?php
include ("conexion/config.php");
$idse=$_GET["dat"];
$rsh=("UPDATE trabajadores SET estado=0 WHERE idpersona='$idse'");
$linkdocu->query($rsh);
mysqli_close($linkdocu);
   $mensaje="delete";
header("Location: user-admin.php?var=$mensaje");
?>