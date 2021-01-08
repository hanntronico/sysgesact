<?php
session_start();
if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='../';</script>";
}
include("conexion/config.php");

$datuser = $_SESSION["usuario"];
$datnomuser = $_SESSION["nombres"];
$idtrabajador = $_SESSION["idtrabajador"];
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

          <?php if($mensa=="yaexit"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> El registro que intenta grabar ya existe.</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>


          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
   
<!--                   <h4 class="card-title">
                  <a href="controles.php" class="btn btn-outline-primary"><i class="mdi mdi-chevron-double-left"></i> Regresar</a>
                  </h4> -->
                  <h4 class="card-title" align="center">Registrar Actividades - MATRIZ REGISTRADA
                    <?php //echo "CÓDIGO : ".$codigo;?>
                  </h4>


<!--                 </div>
              </div>
            </div>
          </div>    -->


          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
<!--                   <h4 class="card-title">
                  <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModalregdoce">Crear Nuevo Registro</button>
                  </h4> -->
                <form class="searchForm" id="formbuscar" method="post" action="busca_actividades.php" enctype="multipart/form-data">

                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <!-- <label for="desccarrera">Escoger usuario : -->
                          <!-- <b style="color: #DD070B;font-size: 12px;">(*)</b> -->
                        <!-- </label> -->
                        <select name="trabajadores" id="trabajadores" class="form-control" required>
                    
                    <?php 
                          $sqlpersonas = "SELECT * FROM personas p 
                    inner join trabajadores t ON p.idpersona = t.idpersona
                    inner join niveles n on t.idnivel = n.idnivel WHERE t.idnivel = 2 ORDER BY 1 DESC";

                            $rspv=$linkdocu->query($sqlpersonas);
                            if($rspv->num_rows>0){
                              while($rwpv=$rspv->fetch_array()){
                                  $cca = $cca + 1;
                                  $idpers = $rwpv["idpersona"];
                                  $nombres = $rwpv["nombres"];
                                  $apaterno = $rwpv["apaterno"];
                                  $amaterno = $rwpv["amaterno"];
                    ?>
                                 <option value="<?php echo $idpers; ?>"> 
                                    <?php echo $nombres." ".$apaterno." ".$amaterno; ?>
                                 </option>
                    <?php } 
                       }
                    ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="desccarrera"> &nbsp; </label>
                        <button type="submit" class="btn btn-success mr-2">BUSCAR</button>
                      </div>
                    </div>
                  </div>
                </form>

                <div id="result"></div>  




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


  // $("#boton").click(function(){
  //   // $.post("046-ejemplo-jquery-post-pagina-externa02.php", function(htmlexterno){
  //   //  $("#cargaexterna").html(htmlexterno);
  //   // });
  // });


    $( "#formbuscar" ).submit(function( event ) {

      // Stop form from submitting normally
      event.preventDefault(); 
     
      // Get some values from elements on the page:
      var $form = $( this );
      term = $form.find( "select[name='trabajadores']" ).val();
      url = $form.attr( "action" );
      // console.log(term);
           
      // Send the data using post
      var posting = $.post( url, { trabajador: term } );
     
      // Put the results in a div
      posting.done(function( data ) {
        // var content = $( data ).find( "content" );
        $( "#result" ).empty().append( data );
        // console.log(content);
      });
    
    });



});
	







  </script>
	
	<?php mysqli_close($linkdocu); ?>
</body>

</html>
