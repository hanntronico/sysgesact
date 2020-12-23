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

    <style type="text/css" media="screen">
/*      [type="date"]::-webkit-inner-spin-button {
        display: none;
      }  */        
    </style>

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

                <div class="card-body">
                  <h4 class="card-title">
                  <a href="egresados.php" class="btn btn-outline-primary"><i class="mdi mdi-chevron-double-left"></i> Regresar</a>
                  </h4>
                  <h4 class="card-title">
                    COMPLETAR DATOS DE EGRESADO: 
                    <?php echo $apepategre." ".$apemategre.", ".$nom_egre." (".$dni.")" ?>
                  </h4>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="carreras-tab" data-toggle="tab" href="#carreras" role="tab" aria-controls="carreras" aria-selected="true">
                      CARRERAS
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="especialidades-tab" data-toggle="tab" href="#especialidades" role="tab" aria-controls="especialidades" aria-selected="false">ESPECIALIDADES</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="grado_tit-tab" data-toggle="tab" href="#grado_tit" role="tab" aria-controls="grado_tit" aria-selected="false">GRADO Y TITULO</a>
                  </li>
                </ul>
                
                <div class="tab-content" id="myTabContent">

                  <div class="tab-pane fade show active" id="carreras" role="tabpanel" aria-labelledby="carreras-tab">

                    <br>
<form class="forms-sample" method="post" action="registrar_admin.php" enctype="multipart/form-data">                    <input type="hidden" name="idid" value="<?php echo $id;?>">
                    <input type="hidden" name="tabegre" value="2">
                    <div class="row">

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="carreras">Carreras <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                           <?php 
                              $consult = ' WHERE estado_carrera=1 ORDER BY 2';
                              // $codcarrera= 1;
                              llenarcombo('carreras','idcarrera, carrera', $consult, $codcarrera, '','codCarrera id=opcCarrera')
                            ?> 
                        </div>  
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="feciniTwo">Fecha de inicio <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="date" name="fecini_carr" class="form-control" required="" id="fecini_carr" placeholder="Fecha de inicio">              
                        </div>
                      </div>
                      <div class="col-md-3">    
                        <div class="form-group">
                          <label for="fecfinTwo">Fecha de fin <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="date" name="fecfin_carr" class="form-control" required="" id="fecfin_carr" placeholder="Fecha de fin">              
                        </div>      
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group">
                          <label for="btngrabar">&nbsp;</label>   
                          <div class="form-group">
                           <button type="submit" name="envia" class="btn btn-primary">Grabar</button>
                          </div>      
                        </div>
                      </div>

                    </div>       
</form>

 <div class="row">
  <div class="col-md-12">

      <br>
      <div class="table-responsive container" style="padding: 0px;">

        <table class="table table-bordered" style="padding: 0px;" >
          <thead style="background-color: #E9ECEF; padding: 0px;">
            <tr>
              <th style="text-align: center;">#</th>
              <th>Carrera</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th style="text-align: center;">OPC.</th>
            </tr>
          </thead>

          <tbody>

            <?php 
              $ide = $id;
              $sqlegre = "SELECT * FROM detalle_carreras as dc, carreras as c 
                          WHERE dc.idcarrera = c.idcarrera 
                          AND dc.idegresado = ".$ide;
              $rsegre=$linkdocu->query($sqlegre);

              if($rsegre->num_rows>0){
                $xx=0;
                while($rwegre=$rsegre->fetch_array()){
                  $idc=$rwegre ["idcarrera"];
            ?>
                <tr>
                  <td><?php echo $xx+1; ?></td>
                  <td style="text-align: left;"><?php echo $rwegre ["carrera"]; ?></td>
                  <td style="text-align: left;"><?php echo dma_shora($rwegre ["fec_inicio"]); ?></td>
                  <td style="text-align: left;"><?php echo dma_shora($rwegre ["fec_fin"]); ?></td>
                  <td style="text-align: center;">
                    <a href='del_det_carr.php?idc=<?php echo $idc.'&ide='.$ide; ?>' onClick='return confirmar2()'>
                      <button class='btn btn-icons btn-circle btn-danger btn-sm' style="font-size: 12px;" title='Eliminar'><i class='mdi mdi-delete'></i></button>
                    </a>

                  </td>
                </tr>    

            <?php
                $xx++;}
              }else {
            ?>    

                <tr>
                  <td colspan="5"><?php echo "No se encontraron registros"; ?></td>
                </tr>
                          
            <?php 
              }
             ?>
          </tbody>



        </table>
      </div>  
  </div>  
 </div> 

                  </div>

<!-- /*******************************************************************************************/ -->

                  <div class="tab-pane fade" id="especialidades" role="tabpanel" aria-labelledby="especialidades-tab">

                    <br>
<form class="forms-sample" method="post" action="registrar_admin.php" enctype="multipart/form-data">
  <input type="hidden" name="idid" value="<?php echo $id;?>">
                    <input type="hidden" name="tabegre" value="3">
                    <div class="row">

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="especialidadesTwo">Especialidades <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                           <?php 
                              $consult = ' WHERE estado_esp=1 ORDER BY 2';
                              // $codcarrera= 1;
                              llenarcombo('especialidades','idespecialidad, especialidad', $consult, $codespecial, '','codEspecialidad id=opcEspecialidad')
                            ?> 
                        </div>  
                      </div>


 
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="feciniTwo">Fecha de inicio <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="date" name="fecini_espe" class="form-control" required="" id="fecini_espe" placeholder="Fecha de inicio">              
                        </div>
                      </div>
                      <div class="col-md-3">    
                        <div class="form-group">
                          <label for="fecfinTwo">Fecha de fin <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="date" name="fecfin_esp" class="form-control" required="" id="fecfin_esp" placeholder="Fecha de fin">              
                        </div>     
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group">
                          <label for="btngrabar">&nbsp;</label>   
                          <div class="form-group">
                           <button type="submit" name="envia" class="btn btn-primary">Grabar</button>
                          </div>      
                        </div>
                      </div>

                    </div>       
</form>

 <div class="row">
  <div class="col-md-12">

      <br>
      <div class="table-responsive container" style="padding: 0px;">
        <table class="table table-bordered">
          <thead style="background-color: #E9ECEF;">
            <tr>
              <th style="text-align: center;">#</th>
              <th>Especialidades</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th style="text-align: center;">OPC.</th>
            </tr>
          </thead>
        
          <tbody>


            <?php 
              $ide = $id;
              $sqlegre = "SELECT * FROM detalle_especialidades as de, especialidades as e 
                          WHERE de.idespecialidad = e.idespecialidad 
                          AND de.idegresado = ".$ide;
              $rsegre=$linkdocu->query($sqlegre);

              if($rsegre->num_rows>0){
                $xx=0;
                while($rwegre=$rsegre->fetch_array()){
                  $idesp=$rwegre ["idespecialidad"];
            ?>
                <tr>
                  <td><?php echo $xx+1; ?></td>
                  <td style="text-align: left;"><?php echo $rwegre ["especialidad"]; ?></td>
                  <td style="text-align: left;"><?php echo dma_shora($rwegre ["fec_ini_esp"]); ?></td>
                  <td style="text-align: left;"><?php echo dma_shora($rwegre ["fec_fin_esp"]); ?></td>
                  <td style="text-align: center;">
                    <a href='del_det_esp.php?idesp=<?php echo $idesp.'&ide='.$ide; ?>' onClick='return confirmar2()'>
                      <button class='btn btn-icons btn-circle btn-danger btn-sm' style="font-size: 12px;" title='Eliminar'><i class='mdi mdi-delete'></i></button>
                    </a>                    

                  </td>
                </tr>    

            <?php
                $xx++;}
              }else {
            ?>    

                <tr>
                  <td colspan="5"><?php echo "No se encontraron registros"; ?></td>
                </tr>
                          
            <?php 
              }
             ?>



          </tbody>

        </table>
      </div>

  </div>  
 </div>

                  </div>

<!-- /*******************************************************************************************/ -->

                  <div class="tab-pane fade" id="grado_tit" role="tabpanel" aria-labelledby="grado_tit-tab">

                    <br>
<form class="forms-sample" method="post" action="registrar_admin.php" enctype="multipart/form-data">
  <input type="hidden" name="idid" value="<?php echo $id;?>">
                    <input type="hidden" name="tabegre" value="4">

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="institucionTwo">Institución educativa <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                           <?php 
                              $consult = ' WHERE estado_institu=1 ORDER BY 2';
                              // $codcarrera= 1;
                              llenarcombo('instituciones','idinstitucion, institucion', $consult, $codespecial, '','codInstituto id=opcInstituto')
                            ?> 
                        </div>  
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                        <label for="feciniTwo">Año de inicio <b style="color: #DD070B;font-size: 12px;">(*)</b></label>

                          <select name="yearini" class="form-control" required="" id="yearini">
                            <?php 
                              $yy = 1940;
                              while ( $yy <= 2099 ) {
                              $seleccionar=""; 
                              if($yy==date('Y')) $seleccionar="selected";  
                            ?>
                              <option value="<?php echo $yy;?>" <?php echo $seleccionar;?> ><?php echo $yy;?></option>
                            <?php $yy++;} ?>
                          </select> 

                        </div>

                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="fecfinTwo">Año de fin <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                           <select name="yearfin" class="form-control" required="" id="yearfin">
                              <?php 
                                $yy = 1940;
                                while ( $yy <= 2099 ) {
                                $seleccionar=""; 
                                if($yy==date('Y')) $seleccionar="selected";  
                              ?>
                                <option value="<?php echo $yy;?>" <?php echo $seleccionar;?> ><?php echo $yy;?></option>
                              <?php $yy++;} ?>
                            </select>                               
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tipoTwo">Tipo <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <?php 
                              $consult = ' WHERE estado_tipogr=1 ORDER BY 1';
                              // $codcarrera= 1;
                              llenarcombo('tipo_grado','idtipo_grado, tipogrado', $consult, $codtipogrado, '','codTipogrado id=opcTipogrado')
                            ?>
                        </div>
                      
                        <div class="form-group">
                          <label for="mencionTwo">Mencion <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="text" name="mencion" class="form-control" required="" id="mencion" placeholder="mención">
                        </div>  

                        <div class="form-group">
                          <label for="horasTwo">Horas <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="number" name="horas" class="form-control" required="" id="horas" placeholder="horas">
                        </div>  
                      

                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="archivopdfTwo">Documento <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="file" name="documento" class="form-control" required="" id="documento" placeholder="documento">
                        </div>

                        <div class="form-group">
                          <label for="periodoTwo">Periodo <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="text" name="periodo" class="form-control" required="" id="periodo" placeholder="periodo">
                        </div>            

                        <div class="form-group">
                          <label for="linkTwo">Link de consulta <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="text" name="link" class="form-control" required="" id="link" placeholder="link">
                        </div>                      
                      </div>
                    
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" align="center">
                          <!-- <label for="btngrabar">&nbsp;</label>    -->
                          <div class="form-group">
                           <button type="submit" name="envia" class="btn btn-primary">Grabar</button>
                          </div>      
                        </div>
                      </div>  
                    </div>

</form>
 <div class="row">
  <div class="col-md-12">

      <div class="table-responsive container" style="padding: 0px;">
        <table class="table table-bordered">
          <thead style="background-color: #E9ECEF;">
            <tr>
              <th style="text-align: center;">#</th>
              <th>TIPO GRADO</th>
              <th>INSTITUCION</th>
              <th>MENCION</th>
              <th>DURACION</th>
              <th style="text-align: center;">OPC.</th>
            </tr>
          </thead>
        
          <tbody>

<!-- // idgrados_titulos idinstitucion idtipo  documento mencion horas year_inicio year_fin  periodo link_consulta
// idinstitucion institucion desc_inst estado_institu
// idtipo_grado, tipogrado, descrip_tipogr, estado_tipogr -->


            <?php 
              $ide = $id;
              $sqlegre = "SELECT tg.tipogrado, inst.institucion, gt.mencion, gt.year_inicio, gt.year_fin, gt.documento, gt.idgrados_titulos
                          FROM det_grados_tit as dtg 
                          INNER JOIN grados_titulos as gt ON dtg.idgrados_titulos = gt.idgrados_titulos 
                          INNER JOIN tipo_grado as tg ON gt.idtipo = tg.idtipo_grado
                          INNER JOIN instituciones as inst ON gt.idinstitucion = inst.idinstitucion
                          WHERE dtg.idegresado =".$ide;

              $rsegre=$linkdocu->query($sqlegre);

              if($rsegre->num_rows>0){
                $xx=0;
                while($rwegre=$rsegre->fetch_array()){;
                  $idgt = $rwegre ["idgrados_titulos"];
            ?>
                <tr>
                  <td><?php echo $xx+1; ?></td>
                  <td style="text-align: left;"><?php echo $rwegre [0]; ?></td>
                  <td style="text-align: left;"><?php echo $rwegre [1]; ?></td>
                  <td style="text-align: left;"><a href="<?php echo "../usuaurius/documentos/".$rwegre [5]; ?>" target="_blank"><?php echo $rwegre [2]; ?></a></td>
                  <td style="text-align: left;"><?php echo $rwegre [3]." - ".$rwegre [4]; ?></td>
                  <td style="text-align: center;">
                    <a href='del_grad_tit.php?idgt=<?php echo $idgt.'&ide='.$ide; ?>' onClick='return confirmar2()'>
                      <button class='btn btn-icons btn-circle btn-danger btn-sm' style="font-size: 12px;" title='Eliminar'><i class='mdi mdi-delete'></i></button>
                    </a>                    

                  </td>
                </tr>    

            <?php
                $xx++;}
              }else {
            ?>    

                <tr>
                  <td colspan="5"><?php echo "No se encontraron registros"; ?></td>
                </tr>
                          
            <?php 
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
              </div>              
            </div>            
          </div>


        </div>

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