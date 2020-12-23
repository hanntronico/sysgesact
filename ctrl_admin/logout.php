<?php
session_start();
include("conexion/config.php");

session_unset();
session_destroy();
print "<script>window.location='../';</script>";
?>