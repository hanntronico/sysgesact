<?php 

require 'PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

include("conexion/config.php");

$datuser = $_SESSION["usuario"];
$datnomuser = $_SESSION["nombres"];

$mensa = $_GET["var"];
$codigo = $_GET["dat"];

  $sqlvista="SELECT * FROM control_activ ca inner join personas p ON ca.idpersona = p.idpersona 
         where idcontrol_activ = ".$codigo." ORDER BY 1 DESC";   

  $rspv=$linkdocu->query($sqlvista);
  if($rspv->num_rows>0){
    while($rwpv=$rspv->fetch_array()){
      // $cca = $cca + 1;
      $id = $rwpv["idcontrol_activ"];
      $ofic_gral = $rwpv["oficina_gral"];
      $oficina = $rwpv["oficina"];


      $dir_general = $rwpv["direccion_general"];
      $dir_oficina = $rwpv["direccion_oficina"];

      $fini_ctrl = $rwpv["fecha_ini_ctrl"];
      $newfec_ini = date("d/m/Y", strtotime($fini_ctrl));
      $ffin_ctrl = $rwpv["fecha_fin_ctrl"];
      $newfec_fin = date("d/m/Y", strtotime($ffin_ctrl));
      
      $cod_persona = $rwpv["idpersona"];
      $nomper = $rwpv["nombres"]; 
      $apepat = $rwpv["apaterno"]; 
      $apemat = $rwpv["amaterno"];      
    }
  }



$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load("excel_files/plantilla_reporte_actividades_UTI.xlsx");

$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('C3', $nomper.' '.$apepat.' '.$apemat);
$sheet->setCellValue('C4', $dir_general);
$sheet->setCellValue('D4', $ofic_gral);
$sheet->setCellValue('C5', $dir_oficina);
$sheet->setCellValue('D5', $oficina);
$sheet->setCellValue('C6', $newfec_ini." al ".$newfec_fin);


$sqlvista="SELECT *
from actividades as a
inner join detalle_actividades as d 
  on a.idactividad = d.idactividad  
inner JOIN control_activ as c 
  on d.idcontrol_activ = c.idcontrol_activ where c.idcontrol_activ=".$id; 


        $rspv=$linkdocu->query($sqlvista);
        if($rspv->num_rows>0){
          $contentStartRow =10;
          $currentContentRow = 10;

          while($rwpv=$rspv->fetch_array()){
              $cact = $cact + 1;
              $id = $rwpv["idactividad"];
              $activ_descrip = $rwpv["activ_descrip"];
              $activ_evidencia = $rwpv["actv_evidencia"];
              $activ_fecha_progra = $rwpv["activ_fecha_programada"];
              $newFecProg = date("d/m/Y", strtotime($activ_fecha_progra));
              
              $act_fecent = $rwpv["activ_fecha_entrega"];
              
              if ($act_fecent==NULL or $act_fecent=="0000-00-00 00:00:00") {
                $newFecEnt = "";
              }else{
                $newFecEnt = date("d/m/Y", strtotime($act_fecent));
              }

              $act_comentario = $rwpv["activ_comentarios"];
              $act_estado = $rwpv["activ_estado"];

              if ($act_estado==1) {
                $est_entregado = "SI";
              }else {
                $est_entregado = "";
              }

              $sheet->insertNewRowBefore($currentContentRow+1,1);
              $sheet->setCellValue('B'.$currentContentRow, $activ_descrip); 
              $sheet->setCellValue('C'.$currentContentRow, $activ_evidencia); 
              $sheet->setCellValue('D'.$currentContentRow, $newFecProg); 
              $sheet->setCellValue('E'.$currentContentRow, $est_entregado); 
              $sheet->setCellValue('F'.$currentContentRow, $newFecEnt); 
              $sheet->setCellValue('G'.$currentContentRow, $act_comentario); 
              $currentContentRow++; 

        }      
      }

date_default_timezone_set("America/Lima");
$nombre_archivo = strtolower(normaliza($cod_persona."_".$nomper."_".$apepat."_".$apemat."_".date("dmY")));

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet;charset=UTF-8");
// header("Content-Disposition: attachment; filename="."datos.xlsx");
header("Content-Disposition: attachment; filename=".$nombre_archivo.".xlsx");
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

?>