<?php 
	include("conexion/config.php");
	include '../usuaurius/funciones.php';
?>

<?php if ($_POST["sw"]==1) { ?>

<script src="../js/myscripts.js"></script>
<br>
<div class="form-group">
  <!-- <label for="provnac1Two">&nbsp;</label> -->
  <label for="provnac2Two">Provincia <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
    <?php 
    	// echo $_POST["id"];
    	$consult = ' WHERE iddepartamento='.$_POST["id"].' ORDER BY 2';
      // $codcarrera= 1;
      llenarcombo('provincias','idprovincia, provincias', $consult, $codprovincia, '','codProvincia id=opcProvincia')
    ?> 
</div> 

<?php }elseif ($_POST["sw"]==2) { ?>
  <br>
  <div class="form-group">
    <!-- <label for="distritonac1Two">&nbsp;</label> -->
    <label for="distritonac2Two">Distrito <b style="color: #DD070B;font-size: 12px;">(*)</b> <?php //echo $_POST["sw"]; ?></label>
      <?php 
        $consult = ' WHERE idprovincia='.$_POST["id"].' ORDER BY 2';
         // $codcarrera= 1;
        llenarcombo('distritos','iddistrito, distritos', $consult, $coddistrito, '','codDistrito id=opcDistrito')
      ?> 
  </div> 
  
<?php } ?>