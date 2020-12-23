<?
include ("../conexion/config.php");

$adm1 = trim($_POST["tipo"]);
$adm2 = trim($_POST["emailcorreo"]);

//consultamos si DNI ya existe en la tabla personal por el tipo de acceso: docente, estudiante
$sqlveri="SELECT u.correo, u.usuario, u.clave, u.nivel, u.nombres FROM usuario AS u INNER JOIN personal_gen AS pg ON u.usuid = pg.idusu WHERE u.usuario = '$adm2' AND u.nivel = '$adm1'";
$rspveri = mysql_query($sqlveri) or die(mysql_error());
if (mysql_num_rows($rspveri) > 0){
  while($rwpveri = mysql_fetch_array($rspveri)){
	  $correo1 = $rwpveri["nombres"];
	  $correo2 = $rwpveri["correo"];
	  $correo3 = $rwpveri["usuario"];
	  $correo4 = $rwpveri["clave"];
	  $dnisi = "si";
  }
}else{
	$men="not";
	  echo "<script>location.href='index.php?var=$men'</script> ";
}
	
  
if($adm1!="" and $adm2!="" and $dnisi=="si"){
	
    mysql_close($linkdocu);
	
	/*mensaje envio correo*/
  /*$destinatario = "$correo2"; 
$asunto = "Recupera Acceso al sistema de transpariencia IESPP"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Usuario Registrado IESPP</title> 
</head> 
<body> 
<h1>Bienvenido!</h1> 
<p> 
<b>Hola '.$correo1.'</b>. Acabas de solicitar el acceso a nuestro sistema de transpariencia documentario con acceso a nuestros documentos.
</p> 
Tras el registro se genero su solicitud de acceso:<br>
Usuario: <b>'.$correo3.'</b><br>
Clave: <b>'.$correo4.'</b><br><br>
<br><br>
ATTE. IESPP VICTOR ANDRES BELAUNDE<br>
Jaen - Peru<br><br><br>
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

//dirección del remitente 
//$headers .= "From: IESPP VICTOR ANDRES BELAUNDE <pepito@desarrolloweb.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 
$headers .= "Bcc: jopedis85@gmail.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);*/
	
	$men="yespass";
	  echo "<script>location.href='../index.php?var=$men'</script> ";
	}else{
	$men="error";
	  echo "<script>location.href='index.php?var=$men'</script> ";
}

?>