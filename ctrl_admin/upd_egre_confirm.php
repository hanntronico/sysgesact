<?php
include ("conexion/config.php");
$idse=$_GET["dat"];
$rsh=("UPDATE egresados SET link_conf='C' WHERE idegresado=".$idse);
$linkdocu->query($rsh);

	$sql1= "SELECT * FROM egresados WHERE idegresado=".$idse." AND estado=1";

	$rsde=$linkdocu->query($sql1);
	if ($rsde->num_rows>0){
		$rowde=$rsde->fetch_array();
		$email = $rowde["email"];
	}	





mysqli_close($linkdocu);

	// $recibe1 = $_POST["nombre"];
	// $recibe2 = $_POST["correo"];
	// $recibe3 = $_POST["asunto"];
	// $recibe4 = $_POST["mensaje"];

$destinatario = $email; 
$asunto = "Mensaje envia desde la web de EGRESADOS "; 
$cuerpo = ' 
<html> 
<head> 
   <title>'.'Bienvenida Egresado'.'</title> 
</head> 
<body> 
<p>Estimado administrador de la IESPP "Victor Andres Belaunde" este mensaje es enviado desde el SISGEG</p>
'.'<p>USUARIO: '.$email.'</p>
<p> La contraseña es la ingresada en su registro</p>'.'
<p>Estimado egresado, el Sistema de Gestión de Egresados del IESPP "Victor Andres Belaunde" le da la bienvenida a su plataforma </p>

</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

//dirección del remitente 
$headers .= "From: Admin de la Sistema de Egresados <iesppvab.info@iesppvab.edu.pe>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: iesppvab.info@iesppvab.edu.pe\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: iesppvab.info@iesppvab.edu.pe\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n";
//$headers .= "Bcc: capacitacion@augeperu.org\r\n";

if (mail($destinatario,$asunto,$cuerpo,$headers)) {
	$mensaje ="axe";
}else{
   $mensaje = "";
}




  $mensaje="axe";
	header("Location: confirm_egre.php?var=$mensaje");
?>