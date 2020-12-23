<?php
// $linkdocu = new mysqli('localhost', 'root', '*274053*', 'biblioteca_jaen');
$linkdocu = new mysqli('localhost', 'root', '*274053*', 'bd_sisgeact');

// ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
if ($linkdocu->connect_errno) {
    // Probemos esto:
    echo "Lo sentimos, este sitio web está experimentando problemas al conectarse a la base de datos.";
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $linkdocu->connect_errno . "\n";
    echo "Error: " . $linkdocu->connect_error . "\n";
    exit;
}else{
	$linkdocu->set_charset("utf8");
}

?>