<div id="content">
	<?php //echo "listado de actividades datos de post: ".$_POST['trabajador']; ?>
</div>

                 <div class="table-responsive">
                   
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm"># <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Ofic. gral. <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Oficina Linea <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Fecha Inicio <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Fecha Fin <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm text-center">Opciones <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                        </tr>
                      </thead>
                      <tbody>
        <?php
// idcontrol_activ, oficina_gral, direccion_general, oficina, direccion_oficina, fecha_ini_ctrl, fecha_fin_ctrl, idpersona
        include("conexion/config.php");
		$sqlvista="SELECT * FROM control_activ where idpersona = ".$_POST['trabajador']." ORDER BY 1 DESC";
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
              <td class="text-center">
<!--                 <a href='controles_edit.php?dat=<?php echo $id;?>' class='btn btn-icons btn-rounded btn-success' title='Editar'><i class='mdi mdi-pencil'></i></a> -->
                <a href='controlar_actividades.php?dat=<?php echo $id;?>' class='btn btn-icons btn-rounded btn-success' title='Editar'><i class='mdi mdi-settings'></i></a>
<!--                 <a href='delete_carrera.php?dat=<?php echo $id;?>' onClick='return confirmar2()'>
                  <button class='btn btn-icons btn-rounded btn-danger' title='Eliminar'><i class='mdi mdi-delete'></i></button>
                </a> -->
              </td>
            </tr>
            <?php 
                    }
                }else {
            ?>
                <tr><td colspan="6" style="text-align: center; padding: 15px;">No se encontraron datos</td></tr>	
            <?php
                }
          	?>
            </tbody>
          </table>
                    
                    <!-- modal nuevo registro docente-->
<!--   <div class="modal fade" id="myModalregdoce" role="dialog">
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
                <input type="hidden" name="idtrabajador" value="<?php //echo $idtrabajador; ?>">      
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
     </div>
    </div>
  </div>   -->                  
                    
                  </div>