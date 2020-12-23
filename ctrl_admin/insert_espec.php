<?php
include ("conexion/config.php");

$espec = trim($_POST["especialidad"]); 
$descespec = trim($_POST["descespec"]); 
$nomcortoespec = trim($_POST["nomcortoespec"]); 

// idespecialidad, especialidad, descrip_especialida, nom_corto_esp, estado_esp

$sqlvista="SELECT * FROM especialidades 
					 WHERE estado_esp = 1 
					 AND especialidad='".$espec."' AND descrip_especialida='".$descespec."'";

$rspv=$linkdocu->query($sqlvista);

if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $este="Si";
}
}else{
	$este="No";
}

if($este=="No"){
if($espec!="" and $descespec!=""){

	$Sqlad = "INSERT INTO especialidades(especialidad, descrip_especialida, nom_corto_esp, estado_esp) 
						VALUES ('".$espec."','".$descespec."','".$nomcortoespec."',1)";

  $linkdocu->query($Sqlad);
  mysqli_close($linkdocu);
	$men="okya";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}
	}else{
	$men="yaexit";
}
echo "<script>location.href='especialidades.php?var=$men'</script> ";



?>