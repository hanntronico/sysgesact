<?php 
include ("conexion/config.php");

$nombres = trim($_POST["nombres"]); 
$apepaterno = trim($_POST["apepaterno"]); 
$apematerno = trim($_POST["apematerno"]); 

$dni = trim($_POST["dni"]); 
$fechanac = trim($_POST["fechanac"]); 
$foto = $_POST["foto"]; 

$lugnac = $_POST["codDistrito"];

$telefono = trim($_POST["telefono"]); 
$correo = trim($_POST["correo"]); 
$redes = trim($_POST["redes"]); 
$info = trim($_POST["info"]); 

// idegresado,nom_egresado,ape_paterno,ape_materno,dni,fec_nac,foto,lug_nac,lug_dom_actual,telefono,email,password,link_conf,redes_sociales,info_contacto,estado

$sqlvista="SELECT * FROM egresados 
					 WHERE nom_egresado='".$nombres.
					     "' AND ape_paterno='".$apepaterno.
					     "' AND ape_materno='".$apematerno."' AND dni='".$dni."'";

$rspv=$linkdocu->query($sqlvista);

if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $este="Si";
}
}else{
	$este="No";
}

if($este=="No"){
if($nombres!="" and $apepaterno!="" and $apematerno!="" and $dni!=""){


				echo $temporal=$_FILES['foto']['tmp_name'];
				echo "<br>";
				echo $nombre=$_FILES['foto']['name'];
				$ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

				date_default_timezone_set('America/Lima');
				$fec=date('Hyimsd');
				$newname = "pic".$fec.".".$ext;


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



	$Sqlad = "INSERT INTO egresados(nom_egresado, 
																	ape_paterno, 
																	ape_materno, 
																	dni, 
																	fec_nac, 
																	foto, 
																	lug_nac, 
																	lug_dom_actual, 
																	telefono, 
																	email, 
																	password, 
																	link_conf, 
																	redes_sociales, 
																	info_contacto, 
																	estado) 
						VALUES ('".$nombres."','".
						           $apepaterno."','".
						           $apematerno."', '".
						           $dni."', '".
						           $fechanac."', '".$newname."', ".$lugnac.", ".$lugnac.", '".$telefono."', '".$correo."', '', 'NC', '".$redes."', '".$info."', 1)";

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
echo "<script>location.href='egresados.php?var=$men'</script> ";


?>