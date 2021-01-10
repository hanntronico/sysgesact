<?php
include ("conexion/config.php");
$idse=$_GET["dat"];
$rsh=("UPDATE trabajadores SET estado=1 WHERE idpersona='$idse'");
$linkdocu->query($rsh);
mysqli_close($linkdocu);
   $mensaje="axe";
header("Location: user-admin.php?var=$mensaje");
?>