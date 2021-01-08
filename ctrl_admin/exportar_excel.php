<?php

$filename = "libros.csv";
// header("Content-Type: application/vnd.ms-excel;charset=UTF-8");
// header("Content-Type: application/xls;charset=UTF-8");
header("Content-Type: application/csv;charset=UTF-8");
header("Content-Disposition: attachment; filename=".$filename);
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);

session_start();
if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='../';</script>";
}
include("conexion/config.php");

$datuser = $_SESSION["usuario"];
$datnomuser = $_SESSION["nombres"];

$mensa = $_GET["var"];
$codigo = $_GET["dat"];

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
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	


    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm"># <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
          <th class="th-sm">Descripción Activ. <i class="fa fa-sort float-right" aria-hidden="true" width="200px"></i></th>
          <th class="th-sm">Producto (evidencia) <i class="fa fa-sort float-right" aria-hidden="true" width="100px"></i></th>
          <th class="th-sm">Fecha Prog. <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
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

			?>

            <tr>
              <td class='font-weight-medium'><?php echo $cact; ?></td>
              <td><?php echo $activ_descrip; ?></td>
              <td><?php echo $activ_evidencia; ?></td>
              <td><?php echo $activ_fecha_progra; ?></td>
            </tr>

			<?php 
			    }
			  }
			?>

			</tbody>
    </table>

</body>