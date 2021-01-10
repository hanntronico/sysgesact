<?php

include ("conexion/config.php");

// echo "llegamos";

$adm1 = trim($_POST["nomusuario"]);
$adm2 = trim($_POST["apepat"]);
$adm3 = trim($_POST["apemat"]);
$adm4 = trim($_POST["dni"]);
$adm5 = trim($_POST["telefono"]);
$adm6 = trim($_POST["email"]);
$adm7 = trim($_POST["usuario"]);
$adm8 = trim($_POST["password"]);
$adm9 = trim($_POST["niveles"]);


$sqlvista="SELECT * FROM personas WHERE num_documento='$adm4'";
$rspv=$linkdocu->query($sqlvista);


if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $este="Si";
}
}else{
	$este="No";
}

if($este=="No"){
if($adm1!="" and $adm2!="" and $adm4!="" and $adm6!="" and $adm7!=""){
	$Sqlad="INSERT INTO personas (nombres, apaterno, amaterno, tipo_documento, num_documento, telefono, email) 
	   	         VALUES ('$adm1','$adm2','$adm3', 1, '$adm4','$adm5','$adm6')";

	   $linkdocu->query($Sqlad);
	   $lasdid = $linkdocu->insert_id;


	// idpersona
	// acceso
	// login
	// password
	// idnivel
	// estado

	$sqlins2 = "INSERT INTO trabajadores (idpersona, acceso, login, password, idnivel, estado) 
				VALUES (".$lasdid.",'act','".$adm7."','".md5($adm8)."', ".$adm9.",0)";

	 $linkdocu->query($sqlins2);

	    mysqli_close($linkdocu);
		$men="okya";
		  echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
		echo $men="error";
		  echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}
}else{
	echo $men="yaexit";
}
echo "<script>location.href='user-admin.php?var=$men'</script> ";
?>