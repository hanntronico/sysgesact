<?php 
include ("conexion/config.php");

$datcod = $_POST["idid"];
$tipogrado = trim($_POST["tipogrado"]); 
$desctipgra = trim($_POST["desctipgra"]); 


// idtipo_grado, tipogrado, descrip_tipogr, estado_tipogr

if($tipogrado!="" and $desctipgra!=""){	
	
	$update="UPDATE tipo_grado SET tipogrado='".$tipogrado."',descrip_tipogr='".$desctipgra."' WHERE idtipo_grado=".$datcod;

  $linkdocu->query($update);
	
  mysqli_close($linkdocu);
	$men="yes";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}

echo "<script>location.href='tipos_grado.php?var=$men'</script> ";



?>