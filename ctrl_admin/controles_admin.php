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
   
                  <h4 class="card-title">
                  <a href="controles.php" class="btn btn-outline-primary"><i class="mdi mdi-chevron-double-left"></i> Regresar</a>
                  </h4>
                  <h4 class="card-title" align="center">Registrar Actividades - MATRIZ REGISTRADA
                    <?php echo "CÓDIGO : ".$codigo;?>
                  </h4>


                </div>
              </div>
            </div>
          </div>   





          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
<!--                   <h4 class="card-title">
                  <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModalregdoce">Crear Nuevo Registro</button>
                  </h4> -->
                <form class="forms-sample" method="post" action="busca_actividades.php" enctype="multipart/form-data">

                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="desccarrera">Escoger usuario :
                          <!-- <b style="color: #DD070B;font-size: 12px;">(*)</b> -->
                        </label>
                        
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
                                  $nombres = $rwpv["oficina_gral"];
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

                        <button type="submit" class="btn btn-success mr-2">BUSCAR</button>

                      </div>
                    </div>
                  </div>

                  <!-- <h4 class="card-title">Controles Registradas</h4> -->
                  <div class="table-responsive">
                   
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm"># <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Ofic. gral. <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Oficina Linea <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Fecha Inicio <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Fecha Fin <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Opciones <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                     <?php
// idcontrol_activ
// oficina_gral
// direccion_general
// oficina
// direccion_oficina
// fecha_ini_ctrl
// fecha_fin_ctrl
// idpersona

			  $sqlvista="SELECT * FROM control_activ where idpersona = ".$idtrabajador." ORDER BY 1 DESC";
			  $rspv=$linkdocu->query($sqlvista);
        if($rspv->num_rows>0){
          while($rwpv=$rspv->fetch_array()){
          	  $cca = $cca + 1;
              $id = $rwpv["idcontrol_activ"];
              $ofic_gral = $rwpv["oficina_gral"];
              $oficina = $rwpv["oficina"];
              $fini_ctrl = $rwpv["fecha_ini_ctrl"];
              $ffin_ctrl = $rwpv["fecha_fin_ctrl"];

          ?>    

            <tr>
              <td class='font-weight-medium'><?php echo $cca; ?></td>
              <td><?php echo $ofic_gral; ?></td>
              <td><?php echo $oficina; ?></td>
              <td><?php echo $fini_ctrl; ?></td>
              <td><?php echo $ffin_ctrl; ?></td>
              <td>
                <a href='controles_edit.php?dat=<?php echo $id;?>' class='btn btn-icons btn-rounded btn-success' title='Editar'><i class='mdi mdi-pencil'></i></a>
                <a href='asignar_actividades.php?dat=<?php echo $id;?>' class='btn btn-icons btn-rounded btn-success' title='Editar'><i class='mdi mdi-pencil'></i></a>
                <a href='delete_carrera.php?dat=<?php echo $id;?>' onClick='return confirmar2()'>
                  <button class='btn btn-icons btn-rounded btn-danger' title='Eliminar'><i class='mdi mdi-delete'></i></button>
                </a>
              </td>
            </tr>
                      <?php 
                          }
                        }
          						?>
            </tbody>
          </table>
                    
                    <!-- modal nuevo registro docente-->
  <div class="modal fade" id="myModalregdoce" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
         <p style="color: #E10D11;font-size: 12px;"><b>Campos requeridos (*)</b></p>
          <form class="forms-sample" method="post" action="insert_control.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <input type="hidden" name="idtrabajador" value="<?php echo $idtrabajador; ?>">      
                <div class="form-group">
                  <label for="carrera">Oficina General <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="ofic_general" class="form-control" placeholder="Oficina General" required >
                </div>

                <div class="form-group">
                  <label for="carrera">Dirección General <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="dir_general" class="form-control" placeholder="Ingrese Dirección General" required >
                </div>


                <div class="form-group">
                  <label for="desccarrera">Oficina <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="oficina" class="form-control" placeholder="Ingrese descripción carrera" required >
                </div>                      

                <div class="form-group">
                  <label for="nomccarr">Dirección Oficina <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="dir_oficina" class="form-control" placeholder="Ingrese nombre corto" required >
                </div>  

                <div class="form-group">
                  <label for="nomccarr">Fecha Inicio <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="date" name="fecha_ini" class="form-control" placeholder="Ingrese nombre corto" required >
                </div>

                <div class="form-group">
                  <label for="nomccarr">Fecha Fin <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="date" name="fecha_fin" class="form-control" placeholder="Ingrese nombre corto" required >
                </div>                

              </div>
            </div>

            <center>
              <button type="submit" class="btn btn-success mr-2">Registrar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </center>
          </form>
        </div>

<!--         <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div> -->
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


    // $( "#searchForm" ).submit(function( event ) {
     
    //   // Stop form from submitting normally
    //   event.preventDefault();
    //   alert("hann");
     
    //   // // Get some values from elements on the page:
    //   // var $form = $( this ),
    //   //   term = $form.find( "input[name='s']" ).val(),
    //   //   url = $form.attr( "action" );
     
    //   // // Send the data using post
    //   // var posting = $.post( url, { s: term } );
     
    //   // // Put the results in a div
    //   // posting.done(function( data ) {
    //   //   var content = $( data ).find( "#content" );
    //   //   $( "#result" ).empty().append( content );
    //   // });
    // });



});
	







  </script>
	
	<?php mysqli_close($linkdocu); ?>
</body>

</html>