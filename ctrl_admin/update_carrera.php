<?php 

include ("conexion/config.php");

$datcod = $_POST["idid"];
$carrera = trim($_POST["carrera"]); 
$descCarrera = trim($_POST["descCarrera"]); 
$nomcortocarr = trim($_POST["nomcortocarr"]); 

if($carrera!="" and $descCarrera!="" and $nomcortocarr!=""){	
	
	$update="UPDATE carreras SET carrera='".$carrera."',descrip_carrera='".$descCarrera."',nom_corto='".$nomcortocarr."' WHERE idcarrera=".$datcod;

  $linkdocu->query($update);
	
  mysqli_close($linkdocu);
	$men="yes";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}

echo "<script>location.href='carreras.php?var=$men'</script> ";

?>