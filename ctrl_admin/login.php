<?php
if(!empty($_POST)){
	if(isset($_POST["userini"]) &&isset($_POST["claveini"])){
		if($_POST["userini"]!=""&&$_POST["claveini"]!=""){
			include("conexion/config.php");
				
			$useusu=null;
		  $mdcincopass = md5($_POST["claveini"]);
			// echo $_POST["userini"];
			// exit();


			// $sql1= "SELECT * FROM usuarios WHERE (usuario='".$_POST["userini"]."' and password='".$mdcincopass."' and estado=1 and acceso='SI') ";

	$sql1= "SELECT * FROM trabajadores INNER JOIN personas 
			ON trabajadores.idpersona = personas.idpersona
			WHERE (login='".$_POST["userini"]."' AND password='".$mdcincopass."' AND estado=1)";

			$rsde=$linkdocu->query($sql1);
			if($rsde->num_rows>0){
			while($rowde=$rsde->fetch_array()){
					$idtrabajador = $rowde["idpersona"];
					$nombretrab = $rowde["nombres"];
					$apepater = $rowde["apaterno"];
					$apemater = $rowde["amaterno"];
					$trab_email = $rowde["email"];
					$trab_estado = $rowde["estado"];
					$usuario = $rowde["login"];
				}
			}

			if($idtrabajador==null){
				print "<script>alert(\"Acceso invalido  Usuario o Clave Incorrectos.\");window.location='../ingresar/';</script>";
			}else{
					session_start();
				
					$_SESSION["idtrabajador"] = $idtrabajador;
					$_SESSION["nombres"] = $nombretrab;
					$_SESSION["apellidos"] = $apepater." ".$apemater;
					$_SESSION["correo"] = $trab_email;
					$_SESSION["usuario"] = $usuario;
					$_SESSION["trab_estado"] = $trab_estado;
					$_SESSION["nivel"] = 1;


				//obtenermos ip
				/*if($_SERVER["HTTP_X_FORWARDED_FOR"]) {
                 // El usuario navega a través de un proxy
                  $ip_proxy = $_SERVER["REMOTE_ADDR"]; // ip proxy
                  $ip_maquina = $_SERVER["HTTP_X_FORWARDED_FOR"]; // ip de la maquina
                 } else {
                 $ip_maquina = $_SERVER["REMOTE_ADDR"]; // No se navega por proxy
                 }*/
				
				// $acceder = $_SESSION["egre_estado"];

						if ($_SESSION["trab_estado"]==1) {
							// echo "accede : ".
							$acceder=1;
						}else{
							// echo "no accede : ".
							$acceder=0;
						}     

					  //obtenemos fecha y hora actual
						 date_default_timezone_set("America/Lima");
						 $fechahoy = date("Y-m-d H:i:s");
				
						if($acceder==1){
							// print "<script>window.location='/sysegresados/usuaurius/';</script>";
							print "<script>window.location='dasboard.php';</script>";
							// echo "entró";
							// exit();
						}else{
							print "<script>window.location='../';</script>";
						}

			}
		}
	}
}

mysqli_close($linkdocu);












// 			/*$rsde = mysql_query($sql1);
// if (mysql_num_rows($rsde) > 0){
// 	while($rowde = mysql_fetch_array($rsde)){*/
// 			$rsde=$linkdocu->query($sql1);
// 			if($rsde->num_rows>0){
// 			while($rowde=$rsde->fetch_array()){
// 					$useusu = $rowde["idusuario"];
// 					$nombresu = $rowde["nombre"];
// 					$nombreape = $rowde["apellidos"];
// 					$useemai = $rowde["correo"];
// 					$userperfil = $rowde["usuario"];
// 					//$estadou = $rowde["activo"];
// 					$usernive = $rowde["idnivel"];
// 					/*$user_foto = $rowde["foto"];*/
// 				}
// 			}

// 			if($useusu==null){
// 				print "<script>alert(\"Acceso invalido  Usuario o Clave Incorrectos.\");window.location='../ctrl_admin/';</script>";
// 			}else{
// 				session_start();
				
// 				$_SESSION["idu"] = $useusu;
// 				$_SESSION["nombre"] = $nombresu;
// 				$_SESSION["apellido"] = $nombreape;
// 				$_SESSION["correo"] = $useemai;
// 				$_SESSION["usuario"] = $userperfil;
// 				//$_SESSION["activo"] = $estadou;
// 				$_SESSION["nivel"] = $usernive;
// 				/*$_SESSION["foto"] = $user_foto;*/
							
// 				//obtenermos ip
// 				/*if($_SERVER["HTTP_X_FORWARDED_FOR"]) {
//                  // El usuario navega a través de un proxy
//                   $ip_proxy = $_SERVER["REMOTE_ADDR"]; // ip proxy
//                   $ip_maquina = $_SERVER["HTTP_X_FORWARDED_FOR"]; // ip de la maquina
//                  } else {
//                  $ip_maquina = $_SERVER["REMOTE_ADDR"]; // No se navega por proxy
//                  }*/
				
// 				$acceder = $_SESSION["nivel"];
				
// 				 //obtenemos fecha y hora actual
// 				 date_default_timezone_set("America/Lima");
// 				 $fechahoy = date("Y-m-d H:i:s");
				
// 				if($acceder==1 || $acceder==2){
// 					print "<script>window.location='dasboard.php';</script>";
// 				}else{
// 					print "<script>window.location='../';</script>";
// 				}

// 			}
// 		}
// 	}
// }

// mysqli_close($linkdocu);

?>