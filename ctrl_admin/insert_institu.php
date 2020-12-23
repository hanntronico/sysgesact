<?php 

include ("conexion/config.php");

$institucion = trim($_POST["institu"]); 
$descinstitu = trim($_POST["descinstitu"]); 


// idinstitucion, institucion, desc_inst, estado_institu

$sqlvista="SELECT * FROM instituciones 
					 WHERE estado_institu = 1 
					 AND institucion='".$institucion."' AND desc_inst='".$descinstitu."'";

$rspv=$linkdocu->query($sqlvista);

if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $este="Si";
}
}else{
	$este="No";
}

if($este=="No"){
if($institucion!="" and $descinstitu!=""){

	$Sqlad = "INSERT INTO instituciones(institucion, desc_inst, estado_institu) 
						VALUES ('".$institucion."','".$descinstitu."',1)";

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
echo "<script>location.href='instituciones.php?var=$men'</script> ";



?>