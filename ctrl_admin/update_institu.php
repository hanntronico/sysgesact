<?php 
include ("conexion/config.php");

$datcod = $_POST["idid"];
$institucion = trim($_POST["institu"]); 
$descinstitu = trim($_POST["descinstitu"]); 


// idinstitucion, institucion, desc_inst, estado_institu

if($institucion!="" and $descinstitu!=""){	
	
	$update="UPDATE instituciones SET institucion='".$institucion."',desc_inst='".$descinstitu."' WHERE idinstitucion=".$datcod;

  $linkdocu->query($update);
	
  mysqli_close($linkdocu);
	$men="yes";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}

echo "<script>location.href='instituciones.php?var=$men'</script> ";



?>