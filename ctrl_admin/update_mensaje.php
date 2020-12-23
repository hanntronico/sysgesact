<?php
include ("conexion/config.php");
$detalle = trim($_POST["detalle"]);
$estado = $_POST["estado"];

// id_msj, mensaje, habilitado

if($detalle!=""){	
	
	$update=("UPDATE mensajes SET mensaje='".$detalle."', habilitado='".$estado."' WHERE id_msj=1");
  
  $linkdocu->query($update);
  mysqli_close($linkdocu);

	$men="yes";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}

echo "<script>location.href='mensaje.php?var=$men'</script> ";
?>