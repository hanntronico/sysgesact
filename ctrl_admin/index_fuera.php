<?php
include("conexion/config.php");
?>
   <!DOCTYPE html><html lang="en"><head>
    <meta charset="UTF-8">
    <title>Registro de Visitas - IESPP VÍCTOR ANDRÉS BELAUNDE</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <style>
        body {
            margin: 0;
            padding: 0;
  background: -webkit-linear-gradient(left, #384C5A, #384C5A);
  background: linear-gradient(to right, #384C5A, #25b7c4);

        }
		#blanco {
			background-color: #FFFFFF;
		}
    </style>
<link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.8.10.min.css">
<!--<link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css">
  -->
<link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/general/snippets-assets/datatables.min.css"><style></style></head>
<body>
<br>
<center><img class="img-fluid" src="images/logo-ini.png"></center>
 <div style="background-color: #FFFFFF">
  <div class="container my-4">
<br>
<div class="row">
            <div class="col-12 grid-margin ">
              <div class="card">
                <div class="card-body">
                 <!--<h4 class="card-title">Registra Nuevo Documento</h4>-->
                  <p class="card-description text-primary">
						<center><font size="+2">Consulta registro de visitas.</font></center>
                    </p>
<form class="form-sample" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Seleccione fecha a consultar</label>
                            <input type="date" name="fecha" class="form-control" required />
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>&nbsp;</label>
                            <button name="btnClickI" class="btn btn-primary btn-block">Consultar</button>
                        </div>
                      </div>
                      
                      </div>
					</form>
                      
                </div>
                
              </div>
            </div>
          </div>
    <br>
    <?php if(isset($_POST['btnClickI'])){ 
			$name = $_POST['fecha'];
	$ffecha = date('d/m/Y', strtotime($name));
	?>
   <hr>
    <p class="font-weight-bold">Fecha Consultado: <?=$ffecha;?></p>
    <div class="table-responsive">
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
   	<th colspan="2">&nbsp;</th>
   	<th colspan="3" bgcolor="#D5D5D5"><center><b>Datos del Visitante</b></center></th>
   	<th>&nbsp;</th>
   	<th colspan="2" bgcolor="#D5D5D5"><center><b>Personal de la institución visitado</b></center></th>
   	<th>&nbsp;</th>
   </tr>
    <tr>
      <th class="th-sm"><b>Fecha</b></th>
      <th class="th-sm"><b>Hora Ingreso</b></th>
      <th class="th-sm"><b>Nombres y Apellidos</b></th>
      <th class="th-sm"><b>DNI</b></th>
      <th class="th-sm"><b>Institución</b></th>
      <th class="th-sm"><b>Motivo Visita</b></th>
      <th class="th-sm"><b>Nombres y Apellidos</b></th>
      <th class="th-sm"><b>Unidad/Oficina</b></th>
      <th class="th-sm"><b>Hora Salida</b></th>
    </tr>
  </thead>
  <tbody>
   <?php
	  //consultamos
	  $visql="SELECT d.idv, d.fecha_in, d.hora_in, d.nom_vi, d.dni_vi, d.institu, d.mot_visita, d.per_visita, d.unid_ofi, d.h_salida FROM reg_visita AS d WHERE d.estado = 'A' AND d.fecha_in='$name' ";
	  $rsvi=$linkdocu->query($visql);
if($rsvi->num_rows>0){
while($rwvi=$rsvi->fetch_array()){
	$cuen = $cuen + 1;
	  $vi0 = $rwvi["idv"];
	  $vi1 = $rwvi["fecha_in"];
	  $vi2 = $rwvi["nom_vi"];
	  $vi2A = $rwvi["dni_vi"];
	  $vi3 = $rwvi["institu"];
	  $vi4 = $rwvi["mot_visita"];
	  $vi5 = $rwvi["per_visita"];
	  $vi6 = $rwvi["unid_ofi"];
	  $vi7 = $rwvi["h_salida"];
	  $vi8 = $rwvi["hora_in"];
	$formatofecha = date('d/m/Y', strtotime($vi1));
	  
	  echo"<tr>";
	 echo"<td>$formatofecha</td>";
	  echo"<td>$vi8</td>";
	  echo"<td>$vi2</td>";
	  echo"<td>$vi2A</td>";
	  echo"<td>$vi3</td>";
	  echo"<td>$vi4</td>";
	  echo"<td>$vi5</td>";
	  echo"<td>$vi6</td>";
	  echo"<td>$vi7</td>";
}
}
	?>

  </tbody>
  <tfoot>
    <tr>
      <th><b>Fecha</b></th>
      <th><b>Hora Ingreso</b></th>
      <th><b>Nombres y Apellidos</b></th>
      <th><b>DNI</b></th>
      <th><b>Institución</b></th>
      <th><b>Motivo Visita</b></th>
      <th><b>Nombres y Apellidos</b></th>
      <th><b>Unidad/Oficina</b></th>
      <th><b>Hora Salida</b></th>
    </tr>
  </tfoot>
</table>
</div>
 <?php } ?>
  </strong>
  </div>
  </div>
  <script src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/compiled-4.8.10.min.js"></script>
  <script src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/general/snippets-assets/datatables.min.js"></script>
  <script>$(document).ready(function () {
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
});</script>
<?php mysqli_close($linkdocu); ?>
</body>
</html>