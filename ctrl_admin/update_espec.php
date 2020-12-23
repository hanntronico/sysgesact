<?php 
include ("conexion/config.php");

$datcod = $_POST["idid"];
$especialidad = trim($_POST["especialidad"]); 
$descespec = trim($_POST["descespec"]); 
$nomcortoesp = trim($_POST["nomcortoespec"]); 

// idespecialidad, especialidad, descrip_especialida, nom_corto_esp, estado_esp

if($especialidad!="" and $descespec!="" and $nomcortoesp!=""){	
	
	$update="UPDATE especialidades SET especialidad='".$especialidad."',descrip_especialida='".$descespec."',nom_corto_esp='".$nomcortoesp."' WHERE idespecialidad=".$datcod;

  $linkdocu->query($update);
	
  mysqli_close($linkdocu);
	$men="yes";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}

echo "<script>location.href='especialidades.php?var=$men'</script> ";

?>