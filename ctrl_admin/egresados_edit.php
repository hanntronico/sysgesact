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
$codigo = $_GET["dat"];
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
          <?php if($mensa=="form"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> No se puede subir imagen, formato no permitido, verifique. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="gran"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> No se puede subir imagen porque excede su peso permitido de 2MB, ajuste el peso de la imagen, intentelo nuevamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
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
                  <a href="egresados.php" class="btn btn-outline-primary"><i class="mdi mdi-chevron-double-left"></i> Regresar</a>
                  </h4>
                  <h4 class="card-title" align="center">Modificacion de Datos - EGRESADOS registradas</h4>
                  <?php
// idegresado, nom_egresado, ape_paterno, ape_materno, dni, fec_nac, foto, lug_nac, lug_dom_actual, telefono, email, password, link_conf, redes_sociales, info_contacto, estado                
                      
                      $sqlvista="SELECT * FROM egresados 
                                 WHERE idegresado=".$codigo." ORDER BY 1 DESC";
                      $rspv=$linkdocu->query($sqlvista);
                      if($rspv->num_rows>0){
                        while($rwpv=$rspv->fetch_array()){
                          $cca = $cca + 1;
                          $id = $rwpv["idegresado"];
                          $nom_egre = $rwpv["nom_egresado"];
                          $apepategre = $rwpv["ape_paterno"];
                          $apemategre = $rwpv["ape_materno"];
                          $dni = $rwpv["dni"];
                          $fecnac = $rwpv["fec_nac"];
                          $foto = $rwpv["foto"];
                          $lugnac = $rwpv["lug_nac"];
                          $telefono = $rwpv["telefono"];
                          $email = $rwpv["email"];
                          $password = $rwpv["password"];
                          $redes = $rwpv["redes_sociales"];
                          $info = $rwpv["info_contacto"];
                        }
                      }

if ($lugnac=='') {$lugnac=0;}

$sqlcombo = "SELECT dp.iddepartamento, p.idprovincia, d.iddistrito
                  FROM distritos as d INNER JOIN provincias as p
                  ON d.idprovincia = p.idprovincia
                  INNER JOIN departamentos as dp
                  ON p.iddepartamento = dp.iddepartamento 
                  WHERE iddistrito=".$lugnac;
$rscombo=$linkdocu->query($sqlcombo);
$rwcombo=$rscombo->fetch_array();

$iddepart = $rwcombo["iddepartamento"];
$idprov = $rwcombo["idprovincia"];
$iddist = $rwcombo["iddistrito"];

?>

         <p style="color: #E10D11;font-size: 12px;"><b>Campos requeridos (*)</b></p>
          <form class="forms-sample" method="post" action="update_egresado.php" enctype="multipart/form-data">
                  <input type="hidden" name="idid" value="<?php echo $id;?>">
                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nombres">Nombres <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <input type="text" name="nombres" class="form-control" placeholder="Ingrese nombres" value="<?php echo $nom_egre;?>" required >
                          </div>

                          <div class="form-group">
                            <label for="apepaterno">Apellido paterno <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <input type="text" name="apepaterno" class="form-control" placeholder="Ingrese apellido paterno" value="<?php echo $apepategre;?>" required >
                          </div>

                          <div class="form-group">
                            <label for="apematerno">Apellido materno <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <input type="text" name="apematerno" class="form-control" placeholder="Ingrese apellido materno" value="<?php echo $apemategre;?>" required >
                          </div>

                          <div class="form-group">
                            <label for="dni">DNI <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <input type="text" name="dni" class="form-control" placeholder="Ingrese número de DNI" value="<?php echo $dni;?>" required >
                          </div>

                          <div class="form-group">
                            <label for="fecnac">Fecha de nacimiento <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <input type="date" name="fecnac" class="form-control" placeholder="Ingrese fecha de nacimiento" value="<?php echo $fecnac;?>" required >
                          </div>

                          <div class="form-group">
                            <label for="password">Password <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <input type="hidden" name="ant_pass" value="<?php echo $password;?>">
                            <input type="password" name="password" class="form-control" placeholder="Ingrese password" value="<?php echo $password;?>" required >
                          </div>

                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="foto">Foto <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <input type="file" name="foto" class="form-control" placeholder="Ingrese foto">
                             <input type="hidden" name="ant_foto" value="<?php echo $foto;?>"> 
                              <a href="../usuaurius/fotos/<?php echo $foto;?>" target="_blank"><?php echo $foto;?></a>
                              <img src="../usuaurius/fotos/<?php echo $foto;?>" alt="<?php echo $foto;?>" width="10%">                                  
                          
                          </div>

                          <div class="form-group">
                            <label for="telefono">Teléfono <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <input type="text" name="telefono" class="form-control" placeholder="Ingrese teléfono" value="<?php echo $telefono;?>" required >
                          </div>

                          <div class="form-group">
                            <label for="correo">Correo <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <input type="text" name="correo" class="form-control" placeholder="Ingrese correo" value="<?php echo $email;?>" required >
                          </div>

                          <div class="form-group">
                            <label for="redes">Redes sociales<b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <input type="text" name="redes" class="form-control" placeholder="Ingrese redes sociales" value="<?php echo $redes;?>" required >
                          </div>

                          <div class="form-group">
                            <label for="info">Info <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <input type="text" name="info" class="form-control" placeholder="Ingrese información" value="<?php echo $info;?>" required >
                          </div>

                        </div>

			                </div>

                      <div class="row">
                        <div class="col-md-4">
                          Lugar de Nacimiento <br>

                          <div class="form-group">
                            <label for="lugnac">Departamento <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                            <?php 
                              $consult = ' ORDER BY 2';
                            // $codcarrera= 1;
                              llenarcombo2('departamentos','iddepartamento, departamento', $consult, $iddepart, '','codDepartamento id=opcDepart required=\'true\'')
                            ?>
                          </div>
                        </div>

                        <div class="col-md-4" id="content_prov">
                          <br>
                          <div class="form-group">
                          <label for="lugnac2">Provincia <b style="color: #DD070B;font-size: 12px;">(*)</b></label>                  
                            <?php 
                              llenarcombo2('provincias','idprovincia, provincias', $consult, $idprov, '','codProvincia id=opcProvincia required=\'true\'')
                            ?>
                          </div>
                        </div>  

              <div class="col-md-4" id="content_distrito">
                <br>
                <div class="form-group">
                  <label for="lugnac3">Distrito <b style="color: #DD070B;font-size: 12px;">(*)</b></label>                  
                  <?php 
                    // $consult = ' ORDER BY 2';
                    // $codcarrera= 1;
                    llenarcombo2('distritos','iddistrito, distritos', $consult, $iddist, '','codDistrito id=opcDistrito required=\'true\'')
                  ?>
                </div>
              </div>  

                      </div>

                        <center><button type="submit" class="btn btn-success mr-2">Actualizar Datos</button></center>
                      </form>

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


  var iddepart;
  var idprov;

  $('#opcDepart').change(function(){
    iddepart = $('#opcDepart').val();
    $.ajax({
      url: 'carga_cbos.php',
      type: 'POST',
      data: {sw:1,id: iddepart},
    })
    .done(function(htmlexterno) {
      // console.log(htmlexterno);
      $("#content_prov").html(htmlexterno);
    })
    .fail(function() {
      // console.log("error");
    })
    .always(function() {
      // console.log("completadooooo");
    });
  });



});
	</script>
	
	<?php mysqli_close($linkdocu); ?>
</body>

</html>