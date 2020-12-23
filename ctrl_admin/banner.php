<?php
session_start();
if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='../';</script>";
}
include("conexion/config.php");

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
  <link rel="stylesheet" href="css/style.css?o=94">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script>
function confirmar2(){
	if(confirm('Estas seguro de eliminar este registro ? \n Si ACEPTAS se eliminara el registro !'))
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
                <p class="text-success"><strong>Mensaje !</strong> Se elimino el registro correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="okya"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se creo el registro nuevo correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="yes"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se modifico el registro correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>

          <?php if($mensa=="form"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> No se puede subir imagen con ese formato, Formatos permitidos: jpg,gif,png; verifique. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="gran"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> Imagen es demaciado grande en su peso de 2kB permitidos; verifique. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
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
                  <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModalregdoce">Crear Nuevo Registro</button>
                  </h4>
                  <h4 class="card-title">Banner Creados (Slider)</h4>
                  <div class="table-responsive">
                   
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Banner</th>
                          <th>Estado</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
						  $sqlvista="SELECT * FROM silder WHERE estado = 'A' ORDER BY idsc DESC";
						  $rspv=$linkdocu->query($sqlvista);
if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $cca = $cca + 1;
	  $dde1 = $rwpv["idsc"];
	  $dde2 = $rwpv["titulo"];
	$dde3 = $rwpv["descripcion"];
	$dde4 = $rwpv["imagen"];
	$dde5 = $rwpv["link"];
	$dde6 = $rwpv["visible"];
	
	if($dde4==""){
		$img = "";
	}else{
		$img = "<img class='img-lg' src='images/auth/$dde4' style='width: 492px;
  height: 100px;'>";
	}
	
	  
	  echo"<tr>";
	  echo"<td class='font-weight-medium'>$cca</td>";
	  echo"<td>$img </td>";
	echo"<td>$dde6 </td>";
	  echo"<td>
	  <button data-toggle='modal' data-target='#myModal$cca' class='btn btn-icons btn-rounded btn-success' title='Editar'><i class='mdi mdi-pencil'></i></button>
	  <a href='delete_banner.php?dat=$dde1' onClick='return confirmar2()'>
      <button class='btn btn-icons btn-rounded btn-danger' title='Eliminar'><i class='mdi mdi-delete'></i></button>
	  </a>
	  </td>";
	  echo"</tr>";

	  //modal editar
	  echo"<div class='modal fade' id='myModal$cca' role='dialog'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <!--<h4 class='modal-title'>Modal Header</h4>-->
        </div>
        <div class='modal-body'>
          <p>Modifica registro</p>
		  <form class='forms-sample' method='post' action='update_banner.php'>
						  <input type='hidden' name='cod' value='$dde1' >";
	?>
                    <div class="row">
                       <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Adjunte imagen (Banner: 1600px - 600px)<font color="#E50B0F"><small>(Opcional)</small></font></label>
                          <input type="file" name="nomimg" class="form-control" placeholder="Seleccione imagen" >
                          <input type="hidden" name="foto" value="<?=$dde4;?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Seleccione estado</label>
                          <select name="estado" class="form-control">
                          	<option value="<?=$dde6;?>"><?=$dde6;?></option>
                          	<option value="Visible">Visible</option>
                          	<option value="Oculto">Oculto</option>
                          </select>
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
          <form class="forms-sample" method="post" action="insert_banner.php" enctype="multipart/form-data">
                       <div class="row">
                       <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Adjunte imagen (Banner: 1600px - 600px)</label>
                          <input type="file" name="nomimg" class="form-control" placeholder="Seleccione imagen" required >
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
	$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
	</script>
	
	<?php mysqli_close($linkdocu); ?>
</body>

</html>