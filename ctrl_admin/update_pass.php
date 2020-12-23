<?php
include ("conexion/config.php");
$idusu=$_POST["keyllave"];
$rsh=("UPDATE usuarios SET password='".md5($_POST["llaveuno"])."' WHERE idusuario=".$idusu);

$linkdocu->query($rsh);
mysqli_close($linkdocu);
   $mensaje="axe";
header("Location: user-admin.php?var=$mensaje");
?>