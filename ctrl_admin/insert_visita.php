<?php
include("conexion/config.php");
$dat1 = trim($_POST["dato1"]);//nombres completos
$dat2 = trim($_POST["dato2"]);//dni
$dat3 = trim($_POST["dato3"]);//institucion
$dat4 = trim($_POST["dato4"]);//fecha ingreso
$dat5 = trim($_POST["dato5"]);//hora ingreso
$dat6 = trim($_POST["dato6"]);//motivo visita
$dat7 = trim($_POST["dato7"]);//nombre a visitar
$dat8 = trim($_POST["dato8"]);//oficina
$dat9 = trim($_POST["dato9"]);//hora salida

//consultamos si el DNI ingresado existe
/*$cuentasql ="SELECT idp, nombres, apellidos, dni FROM persona WHERE estado = 'A' AND dni = '$dat2'";
$rscs=$linkdocu->query($cuentasql);
if($rscs->num_rows>0){
while($rwcs=$rscs->fetch_array()){
	  $per1 = $rwcs["idp"];
	$per2 = $rwcs["nombres"];
	$per3 = $rwcs["apellidos"];
	$per4 = $rwcs["dni"];
	$per4 = "si";
  }
}else{
	$per4 = "no";
	//insertamos nuevo registro de persona
	$inper="insert into persona(nombres, apellidos, dni, estado, fecha_reg) values ('$dat1', '', '$dat2', 'A', now())";
	$linkdocu->query($inper);
	$per1 = mysqli_insert_id($linkdocu);
}*/
	$invi="insert into reg_visita(idp, fecha_in, hora_in, nom_vi, dni_vi, institu, mot_visita, per_visita, unid_ofi, h_salida, estado, fecha_reg) values ('$per1', '$dat4', '$dat5', '$dat1', '$dat2', '$dat3', '$dat6', '$dat7', '$dat8', '$dat9', 'A', now()) ";
  $linkdocu->query($invi);
	mysqli_close($linkdocu);

	$men="vok";
	echo "<script>location.href='dasboard.php?var=$men'</script> ";
	?>
