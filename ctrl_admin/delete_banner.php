<?php
include ("conexion/config.php");
$idse=$_GET["dat"];
$rsh=("update silder set estado='E' where idsc='$idse'");
$linkdocu->query($rsh);
mysqli_close($linkdocu);
   $mensaje="delete";
header("Location: banner.php?var=$mensaje");
?>