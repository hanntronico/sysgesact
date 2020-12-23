<?php
include ("conexion/config.php");
$idse=$_GET["dat"];
$rsh=("UPDATE usuarios SET estado=0 WHERE idusuario='$idse'");
$linkdocu->query($rsh);
mysqli_close($linkdocu);
   $mensaje="delete";
header("Location: user-admin.php?var=$mensaje");
?>