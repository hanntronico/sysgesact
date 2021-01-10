<?php  
include ("conexion/config.php");
// $sqlvista="SELECT * from trabajadores where idpersona=".$_GET["cod"];
$sqlvista="SELECT * FROM personas p INNER JOIN trabajadores t ON p.idpersona = t.idpersona 
           INNER JOIN niveles n ON n.idnivel = t.idnivel WHERE p.idpersona=".$_GET["cod"]." ORDER BY 1 DESC";
// exit();
$rspv=$linkdocu->query($sqlvista);



if($rspv->num_rows>0){
  while($rwpv=$rspv->fetch_array()){
      $este="Si";
      $idpersona = $rwpv["idpersona"];
      $nombres = $rwpv["nombres"];
      $apaterno = $rwpv["apaterno"];
      $amaterno = $rwpv["amaterno"];
      $tipo_documento = $rwpv["tipo_documento"];
      $num_documento = $rwpv["num_documento"];
      $direccion = $rwpv["direccion"];
      $telefono = $rwpv["telefono"];
      $email = $rwpv["email"];
      $idpersona = $rwpv["idpersona"];
      $acceso = $rwpv["acceso"];
      $login = $rwpv["login"];
      $password = $rwpv["password"];
      $idnivel = $rwpv["idnivel"];
      $estado = $rwpv["estado"];
      $idnivel = $rwpv["idnivel"];
      $descripNivel = $rwpv["descripNivel"];
      $estado_nivel = $rwpv["estado_nivel"];

  }
}



?>      


    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <p>Modificar dato de usuario.</p>
          <form class="forms-sample" method="post" action="update_user.php">
            <input type="hidden" name="idid" value="<?php echo $idpersona; ?>">
                  <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="nomusuario">Nombres</label>
                          <input type="text" name="nomusuario" class="form-control" id="nomusuario" placeholder="Nombres completos" required value="<?php echo $nombres; ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="apepat">Apellido Paterno</label>
                          <input type="text" name="apepat" id="apepat" class="form-control" placeholder="Apellidos Paterno" required value="<?php echo $apaterno; ?>">
                          </div>
                        </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="apemat">Apellido Materno</label>
                          <input type="text" name="apemat" id="apemat" class="form-control" placeholder="Apellidos Materno" required value="<?php echo $amaterno; ?>">
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="dni">Num. DNI <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="text" name="dni" id="dni" class="form-control" placeholder="Ingrese DNI" value="<?php echo $num_documento; ?>">
                        </div>                                                           
                    </div>                        
                  </div>        

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="telefono">Teléfono <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Ingrese Numero Celular" value="<?php echo $telefono; ?>">
                        </div>
                      </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese email" required value="<?php echo $email; ?>">
                          </div>
                        </div>
                 </div>


                    <div class="row">
  
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nivel de acceso</label>

                          <select name="niveles" id="niveles" class="form-control">
                          <?php 
                         
                            // idnivel, descripNivel, estado_nivel
                            $sqlniveles="SELECT * FROM niveles WHERE estado_nivel=1 ORDER BY 1 DESC";
                            $rspv=$linkdocu->query($sqlniveles);
                            if($rspv->num_rows>0){
                            while($rwpv=$rspv->fetch_array()){
                                $cca = $cca + 1;
                          ?>
                            <option value="<?php echo $rwpv["idnivel"]; ?>"><?php echo $rwpv["descripNivel"]; ?></option>
                          <?php 
                              }
                            }
                          ?>
                          </select>

                          </div>
                      </div>
                    </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="usuario">Usuario</label>
                              <input type="text" name="usuario" id="usuario" class="form-control" id="exampleInputEmail1" maxlength="100" placeholder="Ingrese nombre usuario" required value="<?php echo $login;?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" id="password" class="form-control" id="exampleInputEmail1" placeholder="Ingrese clave">
                              <input type="hidden" name="ant_clave" value="<?php echo $password;?>">
                            </div>
                          </div>
                        </div>

                        <center>
                          <button type="submit" class="btn btn-success mr-2">Registrar</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </center>
                </form>
        </div>
      <div class="modal-footer">


      </div>
    </div>
