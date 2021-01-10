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
	if(confirm('Estas seguro de dar acceso a este usuario ? \n Si ACEPTAS tendra acceso a la bilioteca'))
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
                <p class="text-success"><strong>Mensaje !</strong> Se registro el acceso al usuario  registrado. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
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
                  <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModalregdoce">Registrar Nuevo Usuario</button>
                  </h4>
                  <h4 class="card-title">Usuarios Creados</h4>
                  <div class="table-responsive">

<!--   
idusuario
nombre
apellidos
dni
correo
celular
usuario
password
idnivel
acceso
fecha_reg
estado -->

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombres</th>
                          <th>Dni</th>
                          <th>Correo</th>
                          <!-- <th>Nivel</th> -->
                          <th>Usuarios</th>
                          <th>Acceso</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
						  $sqlvista="SELECT * FROM personas p INNER JOIN trabajadores t ON p.idpersona = t.idpersona 
                         INNER JOIN niveles n ON n.idnivel = t.idnivel ORDER BY 1 DESC";
						  $rspv=$linkdocu->query($sqlvista);
if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $cca = $cca + 1;


// idpersona
// nombres
// apaterno
// amaterno
// tipo_documento
// num_documento
// direccion
// telefono
// email
// idpersona
// acceso
// login
// password
// idnivel
// estado
// idnivel
// descripNivel
// estado_nivel

	  $id = $rwpv["idpersona"];
	  $nombre = $rwpv["nombres"];
	  $apepaterno = $rwpv["apaterno"];
    $apematerno = $rwpv["amaterno"];
	  $dni = $rwpv["num_documento"];
	  $email = $rwpv["email"];
	  $telefono = $rwpv["telefono"];
	  $login = $rwpv["login"];
	  $password = $rwpv["password"];
    $idnivel = $rwpv["idnivel"];
	  $nivel = $rwpv["descripNivel"];
	  $estado = $rwpv["estado"];

	if($estado==1){ 
    $btnvs = "<button class='btn btn-success btn-sm'>Si</button>"; 
    $btnaxe=""; 
  }
  else{
		$btnaxe = "<a href='update_aceso.php?dat=$id' onClick='return confirmar3()' class='btn btn-icons btn-rounded btn-warning' title='Dar Acceso'><i class='mdi mdi-account-plus'></i></a>";
		$btnvs = "<button class='btn btn-danger btn-sm'>No</button>";
	}
	  
	  echo"<tr>";
	  echo"<td>$cca</td>";
	  echo"<td>$nombre $apepaterno $apematerno </td>";
	  echo"<td>$dni</td>";
	  echo"<td>$email</td>";
	// echo"<td>$nivel</td>";
	echo"<td>$login</td>";
	  //echo"<td>******</td>";
	  echo"<td>$btnvs</td>";
	  //echo"<td>$dde5</td>";
	  echo"<td>";
	  // echo "<button data-toggle='modal' data-target='#myModal$cca' class='btn btn-icons btn-rounded btn-success' title='Editar'><i class='mdi mdi-pencil'></i></button>";
    echo "<button class='btn btn-icons btn-rounded btn-success' title='Controlar' data-toggle='modal' data-target='#myModalEditarUser' onclick='mostrar(".$id.")'><i class='mdi mdi-pencil'></i></button>

	  $btnaxe";
    if ($estado!=0) {
  	  echo "<a href='delete-admin.php?dat=$id' onClick='return confirmar2()'>
        <button class='btn btn-icons btn-rounded btn-danger' title='Eliminar'><i class='mdi mdi-delete'></i></button>
  	  </a>
  	  </td>";
    }

	  echo"</tr>";

	  //modal editar
	  // echo"<div class='modal fade' id='myModal$cca' role='dialog'>
   //  <div class='modal-dialog'>
   //    <div class='modal-content'>
   //      <div class='modal-header'>
   //        <button type='button' class='close' data-dismiss='modal'>&times;</button>
   //        <!--<h4 class='modal-title'>Modal Header</h4>-->
   //      </div>
   //      <div class='modal-body'>
   //        <p>Modifica registro del usuario</p>
		 //  <form class='forms-sample' method='post' action='update_user.php'>
			// 			  <input type='hidden' name='cod' value='$id' >";
	?>

<!--                   <div class="row">
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
                  <div class="col-md-6"> -->
<!--                         <div class="form-group">
                          <label for="exampleInputEmail1">Nivel de acceso</label>
                          <?php 
                            // // idNivel, nivel, descrip_nivel, estado_nivel                          
                            // $consult = ' WHERE estado_nivel=1 ORDER BY 2';
                            // // $codcarrera= 1;
                            // llenarcombo('niveles','idNivel, nivel', $consult, $idnivel, '','nive id=opcNivel')
                          ?>
                        </div> -->


<!--                   </div>
			           </div> -->



<!--                         <div class="row">
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
                          <input type="hidden" name="ant_clave" id="ant_clave" value="<?php //echo $password;?>">
                          </div>
                        </div>
                        </div> -->

                        <!-- <center><button type="submit" class="btn btn-success mr-2">Actualizar</button></center> -->
                     <?php
        //               echo"</form>
		  
        // </div>
        // <div class='modal-footer'>
        //   <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
        // </div>";
	  
  
  }
}
						  ?>
                     
                      </tbody>
                    </table>




<!-- Modal -->
<div class="modal fade" id="myModalregdoce" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <p>Crea un nuevo usuario.</p>
          <form class="forms-sample" method="post" action="insertar_usuario.php">
                  <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="nomusuario">Nombres</label>
                          <input type="text" name="nomusuario" class="form-control" id="nomusuario" placeholder="Nombres completos" required >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="apepat">Apellido Paterno</label>
                          <input type="text" name="apepat" id="apepat" class="form-control" placeholder="Apellidos Paterno" required >
                          </div>
                        </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="apemat">Apellido Materno</label>
                          <input type="text" name="apemat" id="apemat" class="form-control" placeholder="Apellidos Materno" required >
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="dni">Num. DNI <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="number" name="dni" id="dni" class="form-control" placeholder="Ingrese DNI" >
                        </div>                                                           
                    </div>                        
                  </div>        

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="telefono">Teléfono <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Ingrese Numero Celular" >
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese email" required >
                          </div>
                        </div>
                 </div>


                    <div class="row">
  
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nivel de acceso</label>

                          <select name="niveles" id="niveles" class="form-control">
                          <?php 
                         
                            // idnivel, descripNivel, estado_nivel
                            $sqlniveles="SELECT * FROM niveles WHERE estado_nivel=1 ORDER BY 1 DESC";
                            $rspv=$linkdocu->query($sqlniveles);
                            if($rspv->num_rows>0){
                            while($rwpv=$rspv->fetch_array()){
                                $cca = $cca + 1;
                          ?>
                            <option value="<?php echo $rwpv["idnivel"]; ?>"><?php echo $rwpv["descripNivel"]; ?></option>
                          <?php 
                              }
                            }
                          ?>
                          </select>

                          </div>
                      </div>
                    </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="usuario">Usuario</label>
                              <input type="text" name="usuario" id="usuario" class="form-control" id="exampleInputEmail1" maxlength="100" placeholder="Ingrese nombre usuario" required >
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" id="password" class="form-control" id="exampleInputEmail1" placeholder="Ingrese clave" required >
                            </div>
                          </div>
                        </div>

                        <center>
                          <button type="submit" class="btn btn-success mr-2">Registrar</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </center>
                </form>
        </div>
      <div class="modal-footer">


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


<div class="modal fade" id="myModalEditarUser" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document" id="editar_usu">

  </div>
</div>




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
	$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});


function mostrar(id) {
  $(document).ready(function () {
    $("#editar_usu").load("modal_editar_usuario.php?cod=" + id, " ", function () {
      $("#editar_usu").show("slow");
    });
    console.log(id);
  });
}


	</script>
	
	<?php mysqli_close($linkdocu); ?>
</body>

</html>