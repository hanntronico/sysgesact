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
                  <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModalregdoce">Crear Nuevo Registro</button>
                  </h4>
                  <h4 class="card-title">Libros Creados</h4>
                  <div class="table-responsive">
                   
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm"># <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Categoria <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Libro <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Autor <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Editorial <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Paginas <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Disponibilidad <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Opciones <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
						  $sqlvista="SELECT l.idl, l.idc, l.titulo, l.tema, l.autor, l.anio, l.edicion, l.lugar, l.editorial, l.cod_isbn, l.detalle, l.canti_ejemplar, l.canti_pagina, l.disponible, l.foto, l.archivo, l.estado, c.categoria, e.nom_edi FROM libro AS l INNER JOIN categoria AS c ON l.idc = c.idc INNER JOIN editorial AS e ON l.editorial = e.idid WHERE l.estado = 'A' ORDER BY l.idl DESC";
						  $rspv=$linkdocu->query($sqlvista);
if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $cca = $cca + 1;
	  $dde1 = $rwpv["idl"];
	  $dde2 = $rwpv["titulo"];
	$dde3 = $rwpv["tema"];
	$dde4 = $rwpv["autor"];
	$dde5 = $rwpv["anio"];
	$dde6 = $rwpv["edicion"];
	$dde7 = $rwpv["lugar"];
	$dde8 = $rwpv["editorial"];
	$dde9 = $rwpv["cod_isbn"];
	$dde10 = $rwpv["detalle"];
	$dde11 = $rwpv["canti_ejemplar"];
	$dde12 = $rwpv["canti_pagina"];
	$dde13 = $rwpv["disponible"];
	$dde14 = $rwpv["foto"];
	$dde15 = $rwpv["archivo"];
	$dde16 = $rwpv["categoria"];
	$dde17 = $rwpv["nom_edi"];
	  
	  echo"<tr>";
	  echo"<td class='font-weight-medium'>$cca</td>";
	  echo"<td>$dde16 </td>";
	echo"<td>$dde2 </td>";
	echo"<td>$dde4 </td>";
	echo"<td>$dde17 </td>";
	echo"<td>$dde12 </td>";
	echo"<td>$dde13 </td>";
	  echo"<td>
	  <a href='libros_edit.php?dat=$dde1' class='btn btn-icons btn-rounded btn-success' title='Editar'><i class='mdi mdi-pencil'></i></a>
	  <a href='delete_libro.php?dat=$dde1' onClick='return confirmar2()'>
      <button class='btn btn-icons btn-rounded btn-danger' title='Eliminar'><i class='mdi mdi-delete'></i></button>
	  </a>
	  </td>";
	  echo"</tr>";
	  
  
  }
}
						  ?>
                     
                      </tbody>
                    </table>
                    
                    <!-- modal nuevo registro docente-->
                    <div class="modal fade" id="myModalregdoce" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
         <p style="color: #E10D11;font-size: 12px;"><b>Campos requeridos (*)</b></p>
          <form class="forms-sample" method="post" action="insert_libro.php" enctype="multipart/form-data">
                       <div class="row">
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Categoria <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <?php
echo "<select name='nomcate' class='form-control' required>"; 
if($xxc==""){
	echo "<option value='' selected> Seleccione </option>";
}else{
    echo"<option value='$xxc'>$xxca</option>";
}
    $sqlvtxc="SELECT idc, categoria FROM categoria WHERE estado = 'A' ORDER BY categoria ASC";
	$resultadovtxc=$linkdocu->query($sqlvtxc);
if($resultadovtxc->num_rows>0){
while($filavtxc=$resultadovtxc->fetch_array()){
                        echo "<option value='$filavtxc[0]'>$filavtxc[1]"; 
                    }
}
                    echo "</select>";
                    ?>
                          </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombre del libro <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="text" name="nombrelib" class="form-control" placeholder="Ingrese Libro" required >
                          </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tema</label>
                          <input type="text" name="tema" class="form-control" placeholder="Ingrese Tema"  >
                          </div>
                        </div>
			           </div>
                        <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Autor <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="text" name="nombreauto" class="form-control" placeholder="Ingrese Autor" required >
                          </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Año</label>
                          <input type="number" name="year" class="form-control" placeholder="Ingrese Año"  >
                          </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Edicion</label>
                          <input type="text" name="edici" class="form-control" placeholder="Ingrese Edicion"  >
                          </div>
                        </div>
			           </div>
                        <div class="row">
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Codigo ISBN</label>
                          <input type="text" name="codigoisbn" class="form-control" placeholder="Ingrese Codigo" >
                          </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Cant. Ejemplares <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="number" name="ejemplar" class="form-control" placeholder="Ingrese Año" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Cant. Paginas <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="number" name="paginas" class="form-control" placeholder="Ingrese Edicion" required>
                          </div>
                        </div>
			           </div>
                       <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Lugar</label>
                          <input type="text" name="lugar" class="form-control" placeholder="Ingrese Lugar" >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Editorial <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <?php
echo "<select name='edito' class='form-control' required>"; 
if($ec==""){
	echo "<option value='' selected> Seleccione </option>";
}else{
    echo"<option value='$ec'>$eeca</option>";
}
    $sqledi="SELECT idid, nom_edi FROM editorial WHERE estado = 'A' ORDER BY nom_edi ASC";
	$rsedi=$linkdocu->query($sqledi);
if($rsedi->num_rows>0){
while($filaedi=$rsedi->fetch_array()){
                        echo "<option value='$filaedi[0]'>$filaedi[1]"; 
                    }
}
                    echo "</select>";
                    ?>
                          </div>
                        </div>
			           </div>
                        <div class="row">
                       <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Descripcion del libro <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <textarea name="detalle" class="form-control" placeholder="Ingrese detalle del libro" rows="10" required></textarea>
                          </div>
                        </div>
			           </div>
                        <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Portada del Libro - Formato: JPG - PNG (252px - 387px)<b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                          <input type="file" name="caralibro" class="form-control" placeholder="Seleccione foto" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Adjuntar Libro- Formato: PDF</label>
                          <input type="file" name="archivo" class="form-control" placeholder="Seleccione archivo">
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
	</script>
	
	<?php mysqli_close($linkdocu); ?>
</body>

</html>