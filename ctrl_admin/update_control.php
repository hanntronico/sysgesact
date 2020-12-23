<?php 

include ("conexion/config.php");

$datcod = trim($_POST["idid"]);
$datcoduser = trim($_POST["ididuser"]);

$oficgeneral = trim($_POST["ofic_general"]);
$dirgeneral = trim($_POST["dir_general"]);
$oficina = trim($_POST["oficina"]);
$diroficina = trim($_POST["dir_oficina"]);
$fechaini = trim($_POST["fecha_ini"]);
$fechafin = trim($_POST["fecha_fin"]);



if($oficgeneral!="" and $dirgeneral!="" and $oficina!="" and $diroficina!=""){	

	$update="UPDATE control_activ 
		 SET oficina_gral='".$oficgeneral."', 
		     direccion_general ='".$dirgeneral."', 
		     oficina ='".$oficina."', 
		     direccion_oficina ='".$diroficina."', 
		     fecha_ini_ctrl ='".$fechaini."', 
		     fecha_fin_ctrl ='".$fechafin."', 
		     idpersona =".$datcoduser.", 
		     estado_ctrlact =1 WHERE idcontrol_activ=".$datcod;
	
  $linkdocu->query($update);
	
  mysqli_close($linkdocu);
	$men="yes";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}

echo "<script>location.href='controles.php?var=$men'</script> ";

?>