<?php
include ("conexion/config.php");
$datcod = $_POST["cod"];
$nombredoce = trim($_POST["nombredoce"]);
$nomape = trim($_POST["nomape"]);
$dni = trim($_POST["dni"]);
$correo = trim($_POST["correo"]);
$celu = trim($_POST["celu"]);
$nomuse = trim($_POST["nomuse"]);
$nomclave = trim($_POST["nomclave"]);
$nive = trim($_POST["nive"]);

				if ($_POST["nomclave"]==$_POST["ant_clave"]) {
					$pass=$_POST["ant_clave"];
				}else{
					$pass=md5($_POST["nomclave"]);
				}

if($nombredoce!="" and $nomape!="" and $correo!="" and $nomuse!="" and $nomclave!=""){	
	
	$update=("UPDATE usuarios SET nombre='$nombredoce', apellidos='$nomape', dni='$dni', correo='$correo', celular='$celu', usuario='$nomuse', password='$pass', idnivel=$nive WHERE idusuario=$datcod");
      $linkdocu->query($update);

    mysqli_close($linkdocu);
	$men="yes";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}

echo "<script>location.href='user-admin.php?var=$men'</script> ";
?>