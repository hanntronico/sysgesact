<?php
session_start();
if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='../';</script>";
}
include("conexion/config.php");

$datuser = $_SESSION["usuario"];
$datnomuser = $_SESSION["nombres"];

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
                  <a href="reportes.php" class="btn btn-outline-primary"><i class="mdi mdi-chevron-double-left"></i> Regresar</a>
                  <button type="button" class="btn btn-success mr-2" onclick="exportar_excel(<?php echo $codigo; ?>)"><i class='mdi mdi-file-excel'></i>Exportar EXCEL</button>
                  </h4>
                  <h4 class="card-title" align="center">Reporte de Actividades - MATRIZ REGISTRADA
                    <?php echo "CÓDIGO : ".$codigo;?>
                  </h4>
               
                  <?php
              $sqlvista="SELECT * FROM control_activ where idcontrol_activ = ".$codigo." ORDER BY 1 DESC";                  
              $id = $rwpv["idcontrol_activ"];
              $ofic_gral = $rwpv["oficina_gral"];
              $oficina = $rwpv["oficina"];
              $fini_ctrl = $rwpv["fecha_ini_ctrl"];
              $ffin_ctrl = $rwpv["fecha_fin_ctrl"];

                      $rspv=$linkdocu->query($sqlvista);
                      if($rspv->num_rows>0){
                        while($rwpv=$rspv->fetch_array()){
                          // $cca = $cca + 1;
                          $id = $rwpv["idcontrol_activ"];
                          $ofic_gral = $rwpv["oficina_gral"];
                          $oficina = $rwpv["oficina"];
                          $fini_ctrl = $rwpv["fecha_ini_ctrl"];
                          $newfec_ini = date("d/m/Y", strtotime($fini_ctrl));
                          $ffin_ctrl = $rwpv["fecha_fin_ctrl"];
                          $newfec_fin = date("d/m/Y", strtotime($ffin_ctrl));
                        
                        }
                      }

?>

         <!-- <p style="color: #E10D11;font-size: 12px;"><b>Campos requeridos (*)</b></p> -->
          <form class="forms-sample" method="post" action="registrar_actividad.php" enctype="multipart/form-data">
                  <input type="hidden" name="idid" value="<?php echo $id;?>">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="desccarrera">Ofina General </label>
                            <input type="text" name="descCarrera" class="form-control" placeholder="Ingrese oficina general" value="<?php echo $ofic_gral;?>" required readonly>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="desccarrera">Oficina Línea</label>
                            <input type="text" name="descCarrera" class="form-control" placeholder="Ingrese oficina línea" value="<?php echo $oficina;?>" required readonly>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="nomccarr">Fecha Inicio </label>
                            <input type="text" name="nomcortocarr" class="form-control" placeholder="Ingrese fecha Inicio" value="<?php echo $newfec_ini;?>" required readonly>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="nomccarr">Fecha Fin </label>
                            <input type="text" name="nomcortocarr" class="form-control" placeholder="Ingrese Fecha Fin" value="<?php echo $newfec_fin;?>" required readonly>
                          </div>
                        </div>
			                </div>
                      <hr>

                      </form>


                  <div class="table-responsive">
                   
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm"># <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Descripción Activ. <i class="fa fa-sort float-right" aria-hidden="true" width="200px"></i></th>
                          <th class="th-sm">Producto (evidencia) <i class="fa fa-sort float-right" aria-hidden="true" width="100px"></i></th>
                          <th class="th-sm">Fecha Prog. <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <!-- <th class="th-sm text-center">Opciones <i class="fa fa-sort float-right" aria-hidden="true"></i></th> -->
                        </tr>
                      </thead>
                      <tbody>

<?php 


$sqlvista="SELECT *
from actividades as a
inner join detalle_actividades as d 
  on a.idactividad = d.idactividad  
inner JOIN control_activ as c 
  on d.idcontrol_activ = c.idcontrol_activ where c.idcontrol_activ=".$id; 

        $rspv=$linkdocu->query($sqlvista);
        if($rspv->num_rows>0){
          while($rwpv=$rspv->fetch_array()){
              $cact = $cact + 1;
              $id = $rwpv["idactividad"];
              $activ_descrip = $rwpv["activ_descrip"];
              $activ_evidencia = $rwpv["actv_evidencia"];
              $activ_fecha_progra = $rwpv["activ_fecha_programada"];
             
              // if ($rwpv["activ_estado"] == 1 and $rwpv["activ_fecha_entrega"] != NULL) {
              if ($rwpv["activ_estado"] == 1) {
                $estilo_row = "style='background-color: #00FF0055'";
              }else{
                $estilo_row = "style='background-color: #FF000033'";
              }

            $newfecha = date("d/m/Y", strtotime($activ_fecha_progra));
?>
            <tr <?php echo $estilo_row; ?> >
              <td class='font-weight-medium'><?php echo $cact; ?></td>
              <td><?php echo $activ_descrip; ?></td>
              <td><?php echo $activ_evidencia; ?></td>
              <td class="text-center"><?php echo $newfecha; ?></td>
              <!-- <td class="text-center"> -->
                <!-- <a href='delete_carrera.php?dat=<?php //echo $id;?>' onClick='return confirmar2()'> -->
<!--                 <a href='delete_actividad.php?dat=<?php //echo $id;?>' onClick='return confirmar2()'>
                  <button class='btn btn-icons btn-rounded btn-danger' title='Eliminar'><i class='mdi mdi-delete'></i></button>
                </a> -->
              <!-- <a class="dropdown-item" data-toggle="modal" data-target="#myModalControlar"> -->
               <!-- <button class='btn btn-icons btn-rounded btn-primary' title='Controlar' data-toggle="modal" data-target="#myModalControlar" onclick="mostrar(<?php //echo $id; ?>)"><i class='mdi mdi-account-key'></i></button> -->
              <!-- </a> -->

              <!-- </td> -->
            </tr>




                      <?php 
                          }
                        }
                      ?>

                      </tbody>
                    </table>
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


<div class="modal fade" id="myModalControlar" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document" id="control_act">

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


function mostrar(id) {
  $(document).ready(function () {
    $("#control_act").load("modal_controlar_actividad.php?cod=" + id, " ", function () {
      $("#control_act").show("slow");
    });
    console.log(id);
  });
}

function exportar_excel(id) {
  // location.href='exportar_excel2.php?dat='+id;
  location.href='exportar_excel3.php?dat='+id;
}


	</script>
	
	<?php mysqli_close($linkdocu); ?>
</body>

</html>