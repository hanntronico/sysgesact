<?php 

include ("conexion/config.php");

$datcod = $_POST["idid"];
$descactividad = trim($_POST["descactividad"]);
$prodeviden = trim($_POST["prodeviden"]);
$fechaprogra = trim($_POST["fechaprogra"]);

if($descactividad!="" and $prodeviden!="" and $fechaprogra!=""){

	$sqlins = "INSERT INTO actividades (activ_descrip, actv_evidencia, activ_fecha_programada, activ_estado) 
	VALUES ('".$descactividad."','".$prodeviden."','".$fechaprogra."',1)";

  	$linkdocu->query($sqlins);
	
  	$lasdid = $linkdocu->insert_id;

	$sqlins2 = "INSERT INTO detalle_actividades (idcontrol_activ, idactividad) 
				VALUES (".$datcod.",".$lasdid.")";

  	$linkdocu->query($sqlins2);

  	mysqli_close($linkdocu);
	$men="yes";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}	

echo "<script>location.href='asignar_actividades.php?dat=".$datcod."&var=$men'</script>";

?>