<?php  
include ("conexion/config.php");
$sqlvista="SELECT *
           from actividades as a
           inner join detalle_actividades as d 
           on a.idactividad = d.idactividad  
           inner JOIN control_activ as c 
           on d.idcontrol_activ = c.idcontrol_activ 
           where a.idactividad =".$_GET["cod"];

// $sqlvista="SELECT * FROM actividades where idactividad=".$_GET["cod"];
$rspv=$linkdocu->query($sqlvista);

if($rspv->num_rows>0){
  while($rwpv=$rspv->fetch_array()){
      $este="Si";
      $fcini = $rwpv["fecha_ini_ctrl"];
      $fcfin = $rwpv["fecha_fin_ctrl"];
  }
}

$newfec_ini1 = date("d/m/Y", strtotime($fcini));
$newfec_fin1 = date("d/m/Y", strtotime($fcfin));

?>      

<script>
  
  function validacion() {
    var fecini = document.getElementById("fecini").value;
    var fecfin = document.getElementById("fecfin").value;
    var fec_entreg = document.getElementById("fec_entrega").value;
    
    if (fec_entreg >= fecini && fec_entreg <= fecfin) {
      console.log("EN PERIODO");
      return true;
    }else{
      console.log("NO PER");
      alert("Por favor ingresar fecha dentro del periodo");
      return false;
    } 



  }


</script>

      <div class="modal-content">
        <div class="modal-header">
          <h3>Control de actividad <?php echo $_GET["cod"]; ?></h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="forms-sample" method="post" action="registrar_control_admin.php" onsubmit="return validacion()">
          <!-- <form class="forms-sample" method="post" onsubmit="return validacion()"> -->
            <div class="form-group">
              <!-- <input type="checkbox" class="form-control" name="prod_entregado" id="InputEntrega"> -->
              <input type="hidden" name="idid" value="<?php echo $_GET["cod"] ?>">
              <label class="checkbox-inline">
                <input type="checkbox" data-toggle="toggle" name="prod_entregado" id="InputEntrega" required> &nbsp; Producto entregado
              </label>
            </div>
            <!-- <div class="form-group w-50"> -->
            <div class="form-group">
              <label for="fec_entrega">Fecha de Entrega (<?php echo "Inicio: ".$newfec_ini1." - Fin: ".$newfec_fin1; ?>) </label>
              <input type="hidden" name="fecini" id="fecini" value="<?php echo $fcini; ?>">
              <input type="hidden" name="fecfin" id="fecfin" value="<?php echo $fcfin; ?>">
              <input type="date" class="form-control" id="fec_entrega" name="fec_entrega" placeholder="Fecha de entrega" required>
            </div>
            <div class="form-group">
              <label for="comentario">Comentarios</label>
              <input type="text" class="form-control" id="comentario" name="comentario" placeholder="Comentario" required>
            </div>

            <div class="form-group text-right">
              <button type="submit" class="btn btn-success mr-2">Guardar control</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          
          </form>
         
        </div>

        <div class="modal-footer">
        </div>
      </div>