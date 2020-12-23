<?php 

include ("conexion/config.php");

$datcod = $_POST["idid"];
$nombres = trim($_POST["nombres"]);
$apepaterno = trim($_POST["apepaterno"]);
$apematerno = trim($_POST["apematerno"]);
$dni = trim($_POST["dni"]);
$fecnac = trim($_POST["fecnac"]);

$lugnac = trim($_POST["codDistrito"]);

$ant_pass = trim($_POST["ant_pass"]);
$password = trim($_POST["password"]);

$telefono = trim($_POST["telefono"]);
$correo = trim($_POST["correo"]);
$redes = trim($_POST["redes"]);
$info = trim($_POST["info"]);

// idegresado,nom_egresado,ape_paterno,ape_materno,dni,fec_nac,foto,lug_nac,lug_dom_actual,telefono,email,password,link_conf,redes_sociales,info_contacto,estado

if($nombres!="" and $apepaterno!="" and $apematerno!="" and $dni!=""){	
	
				if ($password==$ant_pass) {
					$pass=$ant_pass;
				}else{
					$pass=md5($password);
				}

				if($nombre=$_FILES['foto']['name'] == ''){
					$newname=$_POST["ant_foto"];
				}else{
					echo $temporal=$_FILES['foto']['tmp_name'];
					echo "<br>";
					echo $nombre=$_FILES['foto']['name'];
					$ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

					date_default_timezone_set('America/Lima');
					$fec=date('Hyimsd');
					$newname = "pic".$fec.".".$ext;
				}


		    $check = getimagesize($_FILES['foto']['tmp_name']);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }

				// Check file size
				if ($_FILES["foto"]["size"] > 500000) {
				    echo "Sorry, your file is too large.";
				    $uploadOk = 0;
				}

				// Allow certain file formats
				if($ext != "jpg" && $ext != "png" && $ext != "jpeg"
				&& $ext != "gif" ) {
				    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $uploadOk = 0;
				}
				

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    $men="error";;
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($temporal,"../usuaurius/fotos/".$newname)) {
				        $men="okya";;
				    } else {
				       $men="error";;
				    }
				}



	$update="UPDATE egresados 
					 SET nom_egresado='".$nombres.
					     "', ape_paterno='".$apepaterno.
					     "', ape_materno='".$apematerno.
					     "', dni='".$dni.
					     "', fec_nac='".$fecnac.
					     "', foto='".$newname.
					     "', lug_nac=".$lugnac.
					     ", lug_dom_actual=".$lugnac.
					     ", telefono='".$telefono.
					     "', email='".$correo.
					     "', password='".$pass.
					     "', redes_sociales='".$redes.
					     "', info_contacto='".$info.
					     "' WHERE idegresado=".$datcod;

  $linkdocu->query($update);
	
  mysqli_close($linkdocu);
	$men="yes";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}

echo "<script>location.href='egresados.php?var=$men'</script> ";

?>