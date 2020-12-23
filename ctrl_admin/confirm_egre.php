<?php
session_start();
if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='../';</script>";
}
include("conexion/config.php");
include("../usuaurius/funciones.php");


$datuser = $_SESSION["usuario"];
$datnomuser = $_SESSION["nombre"];

$mensa = $_GET["var"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include("title.php"); ?>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script>
function confirmar2(){
	if(confirm('Estas seguro de eliminar a este usuario ? \n Si ACEPTAS se borrara de la BASE DE DATOS !'))
		return true;
	else
		return false;
}
	  function confirmar3(){
	if(confirm('Estas seguro de confirmar la cuenta de egresado? \n Si ACEPTAS tendra acceso al sistema'))
		return true;
	else
		return false;
}
</script>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include("menu_superior.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include("menu_lateral_izquierdo.php"); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <?php if($mensa=="delete"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se elimino el registro del usuario correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="okya"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se creo el registro del usuario nuevo correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="yes"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se modifico el registro del usuario  correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="axe"){ ?>
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se registro el acceso al egresado registrado. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
           <?php if($mensa=="yaexit"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Mensaje !</strong> Error, no se registro el usuario porque ya se encuentra registrado. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="error"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> Uno o mas campos vacios, verifique. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="faild"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> Uno o mas campos vacios, verifique. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="errordni"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> Numero de DNI ingresado es incorrecto, verifiquelo nuevamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>

          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                  <!-- <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModalregdoce">Registrar Nuevo Usuario</button> -->
                  </h4>
                  <h4 class="card-title">Egresados registrados</h4>
                  <div class="table-responsive">

<!-- idegresado, nom_egresado, ape_paterno, ape_materno, dni, fec_nac, foto, lug_nac, lug_dom_actual, telefono, email, password, link_conf, redes_sociales, info_contacto, estado -->

                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombres</th>
                          <th>Dni</th>
                          <th>Correo</th>
                          <th>Acceso</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
						  $sqlvista="SELECT * FROM egresados WHERE estado = 1 ORDER BY 1 DESC";
						  $rspv=$linkdocu->query($sqlvista);
if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $cca = $cca + 1;

// idegresado, nom_egresado, ape_paterno, ape_materno, dni, fec_nac, foto, lug_nac, lug_dom_actual, telefono, email, password, link_conf, redes_sociales, info_contacto, estado

	  $id = $rwpv["idegresado"];
	  $nombre = $rwpv["nom_egresado"];

    $apepater = $rwpv["ape_paterno"];
	  $apemater = $rwpv["ape_materno"];
    $dni = $rwpv["dni"];
    $fechanac = $rwpv["fec_nac"];
    $foto = $rwpv["foto"];
	  
    $correo = $rwpv["email"];
	  
    $linkconf = $rwpv["link_conf"];
	  
    $estado = $rwpv["estado"];

	// if($acceso=="SI"){ $btnvs = "<button class='btn btn-success btn-sm'>Si</button>"; $btnaxe=""; }else{
	// 	$btnaxe = "<a href='update_aceso.php?dat=$id' onClick='return confirmar3()' class='btn btn-icons btn-rounded btn-warning' title='Dar Acceso'><i class='mdi mdi-pencil'></i></a>";
	// 	$btnvs = "<button class='btn btn-danger btn-sm'>No</button>";
	// }

  if($linkconf=="C"){ 
    $btnvs = "<button class='btn btn-success btn-sm'>Si</button>"; 
    $btnaxe=""; 
  }elseif ($linkconf=="NC") {
    $btnvs = "<button class='btn btn-danger btn-sm'>No</button>";
    $btnaxe = "<a href='upd_egre_confirm.php?dat=$id' onClick='return confirmar3()' class='btn btn-icons btn-rounded btn-warning' title='Dar Acceso'><i class='mdi mdi-pencil'></i></a>";
  }
?>	  

<?php 
	  echo"<tr>";
	  echo"<td class='font-weight-medium'>$cca</td>";
	  echo"<td>$nombre $apepater $apemater</td>";
	  echo"<td>$dni</td>";
	  echo"<td>$correo</td>";

	  echo"<td>$btnvs</td>";
	  //echo"<td>$dde5</td>";
	  echo"<td>

	  $btnaxe";
	  // echo "<a href='delete-admin.php?dat=$id' onClick='return confirmar2()'>
   //    <button class='btn btn-icons btn-rounded btn-danger' title='Eliminar'><i class='mdi mdi-delete'></i></button>
	  // </a>";
	  echo "</td>";
	  echo"</tr>";
  ?>
	  <!-- modal editar -->
	  <div class='modal fade' id='myModal<?php echo $cca;?>' role='dialog'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <!--<h4 class='modal-title'>Modal Header</h4>-->
        </div>
        <div class='modal-body'>
          <p>Modifica registro del usuario</p>
		  <form class='forms-sample' method='post' action='update_user.php'>
						  <input type='hidden' name='cod' value='<?php echo $id;?>' >

                    <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombres</label>
                          <input type="text" name="nombredoce" class="form-control" id="exampleInputEmail1" placeholder="Nombres completos" value="<?=$nombre;?>" required >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Apellidos</label>
                          <input type="text" name="nomape" class="form-control" placeholder="Apellidos completos" value="<?=$apellidos;?>" required >
                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Num. DNI <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="number" name="dni" class="form-control" placeholder="Ingrese DNI" value="<?=$dni;?>" >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Correo</label>
                          <input type="email" name="correo" class="form-control" placeholder="Ingrese correo" value="<?=$correo;?>" required >
                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Numero Celular <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="number" name="celu" class="form-control" placeholder="Ingrese Numero Celular" value="<?=$celular;?>" >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nivel de acceso</label>
<!--                           <select name="nive" class="form-control" required>
                          	<option value="<?=$idnivel;?>"><?=$idnivel;?></option>
                          	<option value="Administrador">Administrador</option>
                          	<option value="Estudiante">Estudiante</option>
                          	<option value="Docente">Docente</option>
                          </select> -->
                          <?php 

// idNivel, nivel, descrip_nivel, estado_nivel                          
                            $consult = ' WHERE estado_nivel=1 ORDER BY 2';
                            // $codcarrera= 1;
                            llenarcombo('niveles','idNivel, nivel', $consult, $idnivel, '','nive id=opcNivel')
                          ?>
                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Usuario</label>
                          <input type="text" name="nomuse" class="form-control" id="exampleInputEmail1" maxlength="100" placeholder="Ingrese nombre usuario" value="<?=$usuario;?>" required >
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Clave</label>
                          <input type="password" name="nomclave" class="form-control" id="exampleInputEmail1" placeholder="Ingrese clave" value="<?=$password;?>" required >
                          <input type="hidden" name="ant_clave" id="ant_clave" value="<?php echo $password;?>">
                          </div>
                        </div>
                        </div>

                        <center><button type="submit" class="btn btn-success mr-2">Actualizar</button></center>
                     <?php
                      echo"</form>
		  
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
        </div>";
	  
  
  }
}
						  ?>
                     
                      </tbody>
                    </table>
                    
                    <!-- modal nuevo registro docente-->
                    <div class="modal fade" id="myModalregdoce" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <p>Crea un nuevo usuario.</p>
          <form class="forms-sample" method="post" action="insert_usu.php">
                       <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombres</label>
                          <input type="text" name="nombredoce" class="form-control" id="exampleInputEmail1" placeholder="Nombres completos" required >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Apellidos</label>
                          <input type="text" name="nomape" class="form-control" placeholder="Apellidos completos" required >
                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Num. DNI <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="number" name="dni" class="form-control" placeholder="Ingrese DNI" >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Correo</label>
                          <input type="email" name="correo" class="form-control" placeholder="Ingrese correo" required >
                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Numero Celular <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="number" name="celu" class="form-control" placeholder="Ingrese Numero Celular" >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nivel de acceso</label>
<!--                           <select name="nive" class="form-control" required>
                          	<option value="">Seleccionar</option>
                          	<option value="Administrador">Administrador</option>
                          	<option value="Estudiante">Estudiante</option>
                          	<option value="Docente">Docente</option>
                          </select> -->
                          <?php 
                          // idNivel, nivel, descrip_nivel, estado_nivel                          
                            $consult = ' WHERE estado_nivel=1 ORDER BY 2';
                            // $codcarrera= 1;
                            llenarcombo('niveles','idNivel, nivel', $consult, $idnivel, '','nive id=opcNivel')
                          ?>

                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Usuario</label>
                          <input type="text" name="nomuse" class="form-control" id="exampleInputEmail1" maxlength="100" placeholder="Ingrese nombre usuario" required >
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Clave</label>
                          <input type="password" name="nomclave" class="form-control" id="exampleInputEmail1" placeholder="Ingrese clave" required >
                          </div>
                        </div>
                        </div>

                        <center><button type="submit" class="btn btn-success mr-2">Registrar</button></center>
                      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include("footer.php"); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script>
	/*$(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });*/
	</script>

<script>
  $(document).ready(function () {
  $('#dtBasicExample').DataTable({
    
    language: {
        "decimal":        "",
    "emptyTable":     "No hay datos",
    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
    "infoFiltered":   "(Filtro de _MAX_ total registros)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Mostrar _MENU_ registros",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search":         "Buscar:",
    "zeroRecords":    "No se encontraron coincidencias",
    "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "Próximo",
        "previous":   "Anterior"
    },
    "aria": {
        "sortAscending":  ": Activar orden de columna ascendente",
        "sortDescending": ": Activar orden de columna desendente"
    }
      }
    
  });
  $('.dataTables_length').addClass('bs-select');
});
  </script>

	
	<?php mysqli_close($linkdocu); ?>
</body>

</html>