<?php 
include ("conexion/config.php");

$carrera = trim($_POST["carrera"]); 
$descCarrera = trim($_POST["descCarrera"]); 
$nomcortocarr = trim($_POST["nomcortocarr"]); 

// idcarrera, carrera, descrip_carrera, nom_corto, estado_carrera

$sqlvista="SELECT * FROM carreras 
					 WHERE estado_carrera = 1 
					 AND carrera='".$carrera."' AND descrip_carrera='".$descCarrera."'";

$rspv=$linkdocu->query($sqlvista);

if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $este="Si";
}
}else{
	$este="No";
}

if($este=="No"){
if($carrera!="" and $descCarrera!=""){

	$Sqlad = "INSERT INTO carreras(carrera, descrip_carrera, nom_corto, estado_carrera) 
						VALUES ('".$carrera."','".$descCarrera."','".$nomcortocarr."',1)";

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
echo "<script>location.href='carreras.php?var=$men'</script> ";


?>