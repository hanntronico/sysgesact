<?php 
include ("conexion/config.php");

$ofic_general = trim($_POST["ofic_general"]);
$dir_general = trim($_POST["dir_general"]);
$oficina = trim($_POST["oficina"]);
$dir_oficina = trim($_POST["dir_oficina"]);
$fecha_ini = trim($_POST["fecha_ini"]);
$fecha_fin = trim($_POST["fecha_fin"]);
$idtrab = trim($_POST["idtrabajador"]);

$sqlvista="SELECT * FROM control_activ 
				WHERE oficina_gral = '".$ofic_general."' 
				AND fecha_ini_ctrl = $fecha_ini
				AND fecha_fin_ctrl = $fecha_fin
				AND idpersona=".$idtrab;

$rspv=$linkdocu->query($sqlvista);

if($rspv->num_rows>0){
	while($rwpv=$rspv->fetch_array()){
		  $este="Si";
	}
}else{
	$este="No";
}

if($este=="No"){

if($ofic_general!="" and $dir_general!="" and $oficina!="" and $dir_oficina!="" and $fecha_ini!="" and $fecha_fin!=""){


	$Sqlad = "INSERT INTO `control_activ`(`oficina_gral`, `direccion_general`, `oficina`, `direccion_oficina`, `fecha_ini_ctrl`, `fecha_fin_ctrl`, `idpersona`, `estado_ctrlact`) 
			  VALUES ('".$ofic_general."','".
			             $dir_general."','".
			             $oficina."','".
			             $dir_oficina."','".
			             $fecha_ini."','".
			             $fecha_fin."',".
			             $idtrab.", 1)";
		

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
echo "<script>location.href='controles.php?var=$men'</script> ";


?>