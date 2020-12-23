<?php
	include ("conexion/config.php");

	$sqlinsreg = "DELETE FROM det_grados_tit 
								WHERE idegresado=".$_GET["ide"]." AND idgrados_titulos=".$_GET["idgt"];
	
	$linkdocu->query($sqlinsreg);

	$sqlinsreg = "DELETE FROM grados_titulos 
								WHERE idgrados_titulos=".$_GET["idgt"];
	
	$linkdocu->query($sqlinsreg);  

  mysqli_close($linkdocu);

  $msn="el1";

  header("location: egresados.php?msn=".$msn);

?>