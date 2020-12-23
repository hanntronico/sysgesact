<?php
$ale = $_GET["var"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include("../title.php"); ?>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
 <center><img class="img-fluid" src="../images/logo-ini.png"></center>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
           <center><font color="#000000"><font size="5">Sistema de Transpariencia</font> </font></center><br>
            <div class="auto-form-wrapper">
            <?php if($ale=="errordni"){ ?>
            <div class="alert alert-danger">
    <strong>Alerta!</strong> el numero de DNI ingresado es incorrecto. intentelo nuevamente.
  </div>
            <?php } ?>
            <?php if($ale=="not"){ ?>
            <div class="alert alert-danger">
    <strong>Alerta!</strong> el correo ingresado no existe en nuestra institucion como Docente / Estudiante.
  </div>
            <?php } ?>
            <?php if($ale=="error"){ ?>
            <div class="alert alert-danger">
    <strong>Alerta!</strong> uno o mas campos vacios verifique.
  </div>
            <?php } ?>
            <?php if($ale=="usu"){ ?>
            <div class="alert alert-danger">
    <strong>Alerta!</strong> ya estas registrado(a) con estos datos anteriormente, inicia sesion con tu usuario y clave de acceso que te llego a tu correo electronico en su momento.
  </div>
            <?php } ?>
            
             <p align="center">Eres estudiante o docente y te olvidaste tu clave.</p>
              <form method="post" action="recupera_clave.php">
                
                <div class="form-group">
                  <div class="input-group">
                    <select name="tipo" class="form-control" required>
                    	<option value="">Seleccionar Tipo</option>
                    	<option value="Docente">Docente</option>
                    	<option value="Estudiante">Estudiante</option>
                    </select>
                    <!--<div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>-->
                  </div>
                </div>

                <div class="form-group">
                 <label>Ingresa tu correo electronico</label>
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Correo electronico" name="emailcorreo" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>

                <!--<div class="form-group d-flex justify-content-center">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> I agree to the terms
                    </label>
                  </div>
                </div>-->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block">Recuperar contraseña</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">No estas registrado ?</span>
                  <a href="../registro/" class="text-black text-small">Crear una nueva cuenta</a>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Ya tengo cuenta ?</span>
                  <a href="../" class="text-black text-small">Ingresar</a>
                </div>
              </form>
            </div>
            <!--<ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>-->
            <div style="background-color: rgba(23, 99, 175, 0.6);
background: rgba(23, 99, 175, 0.6);
color: rgba(23, 99, 175, 0.6);">
            <p class="footer-text text-center"><br><br><font color="#FFFFFF">copyright © 2018. All rights reserved.<br>IESPP VÍCTOR ANDRÉS BELAUNDE<br><br>Desarrollado Por </font> <a href="http://www.azasof.com/" target="_blank"><font color="#FFFFFF"> <b>Azasof</b> </font></a> </p>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/misc.js"></script>
  <!-- endinject -->
</body>

</html>