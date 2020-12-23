<?php
include ("conexion/config.php");
$idse=$_GET["dat"];
$rsh=("UPDATE usuarios SET acceso='SI' WHERE idusuario='$idse'");
$linkdocu->query($rsh);
mysqli_close($linkdocu);
   $mensaje="axe";
header("Location: user-admin.php?var=$mensaje");
?>