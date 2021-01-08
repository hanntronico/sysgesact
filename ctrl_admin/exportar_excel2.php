<?php 

require 'PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



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
  // $id = $rwpv["idcontrol_activ"];
  // $ofic_gral = $rwpv["oficina_gral"];
  // $oficina = $rwpv["oficina"];
  // $fini_ctrl = $rwpv["fecha_ini_ctrl"];
  // $ffin_ctrl = $rwpv["fecha_fin_ctrl"];




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


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('B1', 'MATRIZ DE SEGUIMIENTO TRABAJO REMOTO');
$sheet->mergeCells("B1:I1"); 
$sheet->getStyle('B1')->getFont()->setBold(true);
$sheet->getStyle('B1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('B8', 'Distribución de actividades (actividades realizadas diariamente)');
$sheet->mergeCells("B8:D8"); 
$sheet->getStyle("B8")->getFont()->setBold(true);
$sheet->getStyle('B8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


$tableHead =[
	'font'=>[
		'color'=>[
			'rgb'=>'000000'
		],
	],
	'fill'=>[
		'fillType' => Fill::FILL_SOLID,
		'startColor' => [
			'rgb' => 'DBE5F1'
		]
	],
];

$tableHead2 =[
	'font'=>[
		'color'=>[
			'rgb'=>'000000'
		],
	],
	'fill'=>[
		'fillType' => Fill::FILL_SOLID,
		'startColor' => [
			'rgb' => 'D6E3BC'
		]
	],
];

$sheet->getStyle("B8")->applyFromArray($tableHead);
$sheet->getStyle("E8")->applyFromArray($tableHead2);


$sheet->mergeCells("E8:G8"); 
$sheet->setCellValue('E8', 'Cumplimiento de actividades (da la conformidad el jefe inmediato)');
$sheet->getStyle("E8")->getFont()->setBold(true);
$sheet->getStyle('E8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);



// $lastrow = $sheet->getHighestRow(); 

$sheet->setCellValue('B3', 'Nombre y Apellido del Servidor (a):');
$sheet->getColumnDimension('A')->setWidth(2);

$sheet->getRowDimension(8)->setRowHeight(-1);

$sheet->getColumnDimension('B')->setWidth(30);
$sheet->getColumnDimension('C')->setWidth(40);
$sheet->getColumnDimension('D')->setWidth(20);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(20);
$sheet->getColumnDimension('G')->setWidth(30);

$sheet->setCellValue('C3', $nomper.' '.$apepat.' '.$apemat);
$sheet->setCellValue('C4', $dir_general);
$sheet->setCellValue('D4', $ofic_gral);
$sheet->setCellValue('C5', $dir_oficina);
$sheet->setCellValue('D5', $oficina);
$sheet->setCellValue('C6', $newfec_ini." al ".$newfec_fin);


$sheet->setCellValue('B4', 'Dirección General/Oficina General:');
$sheet->setCellValue('B5', 'Dirección de Línea/Oficina:');
$sheet->setCellValue('B6', 'Fecha:');





// $sheet->getRowDimension('1')->setRowHeight(40);  




// $cellIterator = $sheet->getRowIterator()->current()->getCellIterator(); 
// $cellIterator->setIterateOnlyExistingCells(true); 
// foreach($cellIterator as $cell) { 
//      $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true); 
// }
date_default_timezone_set("America/Lima");
$nombre_archivo = strtolower(normaliza($cod_persona."_".$nomper."_".$apepat."_".$apemat."_".date("dmY")));

// $write = new Xlsx($spreadsheet);
// $write->save('excel_files/'.$nombre_archivo.'.xlsx');

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet;charset=UTF-8");
header("Content-Disposition: attachment; filename=".$nombre_archivo.".xlsx");
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');




// echo "<script>location.href='asignar_actividades.php?dat=".$codigo."'</script> ";

?>