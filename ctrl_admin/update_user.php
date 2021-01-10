<?php
include ("conexion/config.php");

$datcod = $_POST["idid"];
$adm1 = trim($_POST["nomusuario"]);
$adm2 = trim($_POST["apepat"]);
$adm3 = trim($_POST["apemat"]);
$adm4 = trim($_POST["dni"]);
$adm5 = trim($_POST["telefono"]);
$adm6 = trim($_POST["email"]);
$adm7 = trim($_POST["usuario"]);
$adm8 = trim($_POST["password"]);
$adm9 = trim($_POST["niveles"]);

	if ($_POST["password"]==$_POST["ant_clave"]) {
		$pass=$_POST["ant_clave"];
	}else{
		$pass=md5($_POST["password"]);
	}

	if($adm1!="" and $adm2!="" and $adm3!="" and $adm4!="" and $adm5!=""){	
	
		$update=("UPDATE `personas` SET `nombres`='$adm1',
			                              `apaterno`='$adm2',
			                              `amaterno`='$adm3',
			                              `tipo_documento`=1,
			                              `num_documento`='$adm4',
			                              `telefono`='$adm5',
			                              `email`='$adm6' 
			        WHERE idpersona=".$datcod);
  	$linkdocu->query($update);

		$update2=("UPDATE `trabajadores` SET `login`='$adm7',
																				`password`='$pass',
																				`idnivel`='$adm9'
							WHERE idpersona=".$datcod);
  	$linkdocu->query($update2);


    mysqli_close($linkdocu);
	$men="yes";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}

echo "<script>location.href='user-admin.php?var=$men'</script> ";
?>