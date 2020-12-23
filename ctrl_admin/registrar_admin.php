<?php 
	include ("../ctrl_admin/conexion/config.php");

	$page = "egresados";

	switch ($_POST["tabegre"]) {

/********************************** registro 1 DATOS ********************************************/

		case '2':

				// echo "entro a tab 2";
				// echo " | id: ".$_POST["idid"];
				// echo " | cod carrera: ".$_POST["codCarrera"];
				// echo " | fecha ini: ".$_POST["fecini_carr"];
				// echo " | fecha fin: ".$_POST["fecfin_carr"];
				// exit();

				$sqlingcarr = "SELECT * FROM detalle_carreras 
											 WHERE idegresado=".$_POST["idid"]." AND idcarrera=".$_POST["codCarrera"];
				// exit();

				$rsde=$linkdocu->query($sqlingcarr);
				

				if($rsde->num_rows>0){
					$msn="ec";
				}else {
					$sqlingcarr = "INSERT INTO detalle_carreras(idegresado, idcarrera, fec_inicio, fec_fin) 
												 VALUES (".$_POST["idid"].",".
												 					 $_POST["codCarrera"].",'".
												 					 $_POST["fecini_carr"]."','".
												 					 $_POST["fecfin_carr"]."')";			
					$linkdocu->query($sqlingcarr);
		  		mysqli_close($linkdocu);


  				$msn='1c';
  			}

			break;		


/*********************************  registro 2 CARRERAS  ****************************************/

		case '3':

			// echo "entro a tab 3";
			// echo "id: ".$_POST["idid"];
			// exit();

			
			$sqlingcarr = "SELECT * FROM detalle_especialidades 
										 WHERE idegresado=".$_POST["idid"]." AND idespecialidad=".$_POST["codEspecialidad"];		
			 
			$rsde=$linkdocu->query($sqlingcarr);

			if($rsde->num_rows>0){
				$msn="ee";
			}else {
				$sqlingcarr = "INSERT INTO detalle_especialidades(idegresado, idespecialidad, fec_ini_esp, fec_fin_esp) 
											 VALUES (".$_POST["idid"].",".
											 					 $_POST["codEspecialidad"].",'".
											 					 $_POST["fecini_espe"]."','".
											 					 $_POST["fecfin_esp"]."')";			
				$linkdocu->query($sqlingcarr);
	  		mysqli_close($linkdocu);

	  	 	$msn='1e';
			}

			break;

/*********************************  registro 3 Especialidades  ****************************************/

		// case '4':

			// echo $_POST["codEspecialidad"]."<br>";
			// echo $_POST["fecini_espe"]."<br>";
			// echo $_POST["fecfin_esp"]."<br>";

// echo $codInstituto = "codInstituto: ".$_POST["codInstituto"]."<br>";
// echo $fecini_carr = "fecini_carr: ".$_POST["fecini_carr"]."<br>";
// echo $fecfin_carr = "fecfin_carr: ".$_POST["fecfin_carr"]."<br>";
// echo $tipo_grado = "tipo_grado: ".$_POST["codTipogrado"]."<br>";
// echo $mencion = "mencion: ".$_POST["mencion"]."<br>";
// echo $horas = "horas: ".$_POST["horas"]."<br>";
// echo $documento = "documento: ".$_FILES['documento']['name']."<br>";
// echo $periodo = "periodo: ".$_POST["periodo"]."<br>";
// echo $link = "link: ".$_POST["link"]."<br>";

// exit();



			// break;


/*********************************  registro 4 GRADOS Y TITULOS  **********************************/

		case '4':

// echo $codInstituto = "codInstituto: ".$_POST["codInstituto"]."<br>";
// echo $yearini = "yearini: ".$_POST["yearini"]."<br>";
// echo $yearfin = "yearfin: ".$_POST["yearfin"]."<br>";
// echo $tipo_grado = "tipo_grado: ".$_POST["codTipogrado"]."<br>";
// echo $mencion = "mencion: ".$_POST["mencion"]."<br>";
// echo $horas = "horas: ".$_POST["horas"]."<br>";
// echo $documento = "documento: ".$_FILES['documento']['name']."<br>";
// echo $periodo = "periodo: ".$_POST["periodo"]."<br>";
// echo $link = "link: ".$_POST["link"]."<br>";

// idgrados_titulos	idinstitucion	idtipo	documento	mencion	horas	year_inicio	year_fin	periodo	link_consulta


			$sqlingradtit = "SELECT * FROM grados_titulos 
										 WHERE idinstitucion=".$_POST["codInstituto"].
										 " AND idtipo=".$_POST["codTipogrado"].
										 " AND mencion='".$_POST["mencion"]."'".
										 " AND year_inicio='".$_POST["yearini"]."'".
										 " AND year_fin='".$_POST["yearfin"]."'";

			$rsde=$linkdocu->query($sqlingradtit);



			if($rsde->num_rows>0){
				$msn="ee";
			}else {

					// $temporal=$_FILES['documento']['tmp_name'];
					// $nombre=$_FILES['documento']['name'];
					// $ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

					// date_default_timezone_set('America/Lima');
					// $fec=date('Hyimsd');
					// $newname = "doc".$fec.".".$ext;

					// move_uploaded_file($temporal,"documentos/".$newname);



				$uploadOk = 1;

				if($nombre=$_FILES['documento']['name'] == ''){
					$newname='';
				}else{
					$temporal=$_FILES['documento']['tmp_name'];
					$nombre=$_FILES['documento']['name'];
					$ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

					date_default_timezone_set('America/Lima');
					$fec=date('Hyimsd');
					$newname = "doc".$fec.".".$ext;
				}


				// Check file size
				if ($_FILES["documento"]["size"] > 500000) {
				    echo "Sorry, your file is too large.";
				    $uploadOk = 0;
				    $msn='err3';
				}


				// Allow certain file formats
				if($ext != "pdf" ) {
				    echo "Sorry, only PDF files are allowed.";
				    $uploadOk = 0;
				    $msn='err2';
				}


				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    if ($msn=='err2') {
				    	$msn='err2';
				    }elseif ($msn=='err1') {
				    	$msn='err1';
				    }elseif ($msn=='err3') {
				    	$msn=='err3';
				    }
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($temporal,"../usuaurius/documentos/".$newname)) {
				        $msn='1g';
								
								$sqlgradtit = "INSERT INTO grados_titulos(idinstitucion, idtipo, documento, mencion, horas, year_inicio, year_fin, periodo, link_consulta) 
															 VALUES (".$_POST["codInstituto"].",".
															           $_POST["codTipogrado"].",'".
															           $newname."','".
															           $_POST["mencion"]."','".
															           $_POST["horas"]."',".
															           $_POST["yearini"].",".
															           $_POST["yearfin"].",'".
															           $_POST["periodo"]."','".
															           $_POST["link"]."')";			
								$linkdocu->query($sqlgradtit);

								$lcod = $linkdocu->insert_id;

								$sqlinsdtg = "INSERT INTO det_grados_tit(idegresado, idgrados_titulos) VALUES (".$_POST["idid"].",".$lcod.")";
								$linkdocu->query($sqlinsdtg);

				    } else {
				        $msn='err1';
				    }
				


				}	






	  		
	  		mysqli_close($linkdocu);

	  		// $page="registro4";
	  	 	// $msn='1g';
			}

			break;



}

header("location: ".$page.".php?msn=".$msn);

?>