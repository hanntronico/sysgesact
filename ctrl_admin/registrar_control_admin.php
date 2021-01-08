<?php 

include ("conexion/config.php");

// echo $_POST["prod_entregado"]."<br>";
// echo $_POST["fec_entrega"]."<br>";
// echo $_POST["comentario"]."<br>";


	// echo $retVal = ($_POST["prod_entregado"]=="on") ? $pentrega=1 : $pentrega=0 ;
if ($_POST["prod_entregado"]=="on") $pentrega=1;
else $pentrega=0;

if ($_POST["fec_entrega"] != "" and $_POST["comentario"] != "") {
	$sqlcontrol = "UPDATE actividades 
	               SET activ_fecha_entrega='".$_POST["fec_entrega"]."', activ_comentarios='".$_POST["comentario"]."', activ_estado=".$pentrega." WHERE idactividad=".$_POST["idid"];
	$linkdocu->query($sqlcontrol);
	mysqli_close($linkdocu);
	$men="yes";
}else{
	$men="error";
}

echo "<script>location.href='controles_admin.php?var=$men'</script> ";

?> 