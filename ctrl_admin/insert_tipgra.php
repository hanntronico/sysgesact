<?php
include ("conexion/config.php");

$tipgra = trim($_POST["tipogrado"]); 
$desctipgra = trim($_POST["desctipgra"]); 


// idtipo_grado, tipogrado, descrip_tipogr, estado_tipogr

$sqlvista="SELECT * FROM tipo_grado 
					 WHERE estado_tipogr = 1 
					 AND tipogrado='".$tipgra."' AND descrip_tipogr='".$desctipgra."'";

$rspv=$linkdocu->query($sqlvista);

if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $este="Si";
}
}else{
	$este="No";
}

if($este=="No"){
if($tipgra!="" and $desctipgra!=""){

	$Sqlad = "INSERT INTO tipo_grado(tipogrado, descrip_tipogr, estado_tipogr) 
						VALUES ('".$tipgra."','".$desctipgra."',1)";

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
echo "<script>location.href='tipos_grado.php?var=$men'</script> ";

?>