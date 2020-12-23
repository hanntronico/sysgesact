<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="images/faces-clipart/pic-4.png" alt="Perfil del Usuario">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?=$datnomuser;?></p>
                  <div>
                    <small class="designation text-muted">Usuario: <?=$datuser;?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <!--<button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button>-->
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="dasboard.php">
             <strong>
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Principal</span>
              </strong>
            </a>
          </li>





<?php 

// idusuario, nombre, apellidos, dni, correo, celular, usuario, password, idnivel, acceso, fecha_reg, estado


// idNivel, nivel, descrip_nivel, estado_nivel

   $usuniv ="SELECT * 
              FROM trabajadores as t INNER JOIN niveles as n 
              ON t.idnivel = n.idnivel 
              WHERE estado = 1 and n.estado_nivel = 1 AND idpersona=".$_SESSION["idtrabajador"];

  $rshr2=$linkdocu->query($usuniv);
  
  if($rshr2->num_rows>0){
    $rwhr2=$rshr2->fetch_array();
    $codnivel = $rwhr2["idnivel"];
  }
?>

<?php if ($codnivel == 1): ?>

          <li class="nav-item">
            <a class="nav-link" href="controles_admin.php">
             <strong>
              <i class="menu-icon mdi mdi-account-multiple"></i>
              <span class="menu-title">Controlar</span>
              </strong>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="#">
             <strong>
              <i class="menu-icon mdi mdi-account-multiple"></i>
              <span class="menu-title">Asignar Actividades</span>
              </strong>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="reportes.php">
             <strong>
              <i class="menu-icon mdi mdi-book-open-page-variant"></i>
              <span class="menu-title">Reportes</span>
              </strong>
            </a>
          </li>

  

<!--           <li class="nav-item">
            <a class="nav-link" href="confirm_egre.php">
             <strong>
              <i class="menu-icon mdi mdi-account-check"></i>
              <span class="menu-title">Confirmar egresados</span>
              </strong>
            </a>
          </li>          

          <li class="nav-item">
            <a class="nav-link" href="carreras.php">
             <strong>
              <i class="menu-icon mdi mdi-book-open-page-variant"></i>
              <span class="menu-title">Carreras</span>
              </strong>
            </a>
          </li> -->

<!--           <li class="nav-item">
            <a class="nav-link" href="especialidades.php">
             <strong>
              <i class="menu-icon mdi mdi-book-plus"></i>
              <span class="menu-title">Especialidades</span>
              </strong>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="tipos_grado.php">
             <strong>
              <i class="menu-icon mdi mdi-book"></i>
              <span class="menu-title">Tipos Grado</span>
              </strong>
            </a>
          </li>          

          <li class="nav-item">
            <a class="nav-link" href="instituciones.php">
             <strong>
              <i class="menu-icon mdi mdi-book"></i>
              <span class="menu-title">Instituciones</span>
              </strong>
            </a>
          </li>   

          <li class="nav-item">
            <a class="nav-link" href="user-admin.php">
             <strong>
              <i class="menu-icon mdi mdi-account-key"></i>
              <span class="menu-title">Crear Usuarios</span>
              </strong>
            </a>
          </li> -->
          
<?php endif ?>

<?php if ($codnivel == 2): ?>
  
          <li class="nav-item">
            <a class="nav-link" href="controles.php">
             <strong>
              <i class="menu-icon mdi mdi-book-open-page-variant"></i>
              <span class="menu-title">Controles</span>
              </strong>
            </a>
          </li>
  
<?php endif ?>




<!--           <li class="nav-item">
            <a class="nav-link" href="categoria.php">
             <strong>
              <i class="menu-icon mdi mdi-format-list-numbers"></i>
              <span class="menu-title">Crear Categorias</span>
              </strong>
            </a>
          </li> -->

<!--           <li class="nav-item">
            <a class="nav-link" href="editorial.php">
             <strong>
              <i class="menu-icon mdi mdi-home-modern"></i>
              <span class="menu-title">Crear Editoriales</span>
              </strong>
            </a>
          </li> -->

<!--           <li class="nav-item">
            <a class="nav-link" href="banner.php">
             <strong>
              <i class="menu-icon mdi mdi-compare"></i>
              <span class="menu-title">Banner Slider</span>
              </strong>
            </a>
          </li> -->
<!--           <li class="nav-item">
            <a class="nav-link" href="mensaje.php">
             <strong>
              <i class="menu-icon mdi mdi-comment-processing"></i>
              <span class="menu-title">Mensaje Pop-up</span>
              </strong>
            </a>
          </li> -->
<!--           <li class="nav-item">
            <a class="nav-link" href="libros.php">
             <strong>
              <i class="menu-icon mdi mdi-book-open-page-variant"></i>
              <span class="menu-title">Libros</span>
              </strong>
            </a>
          </li> -->
<!--           <li class="nav-item">
            <a class="nav-link" href="prestamos.php">
             <strong>
              <i class="menu-icon mdi mdi-book"></i>
              <span class="menu-title">Prestamos</span>
              </strong>
            </a>
          </li> -->
<!--           <li class="nav-item">
            <a class="nav-link" href="reservacion.php">
             <strong>
              <i class="menu-icon mdi mdi-book-plus"></i>
              <span class="menu-title">Reservaciones</span>
              </strong>
            </a>
          </li> -->
<!--           <li class="nav-item">
            <a class="nav-link" href="solicitudes.php">
             <strong>
              <i class="menu-icon mdi mdi-book-plus"></i>
              <span class="menu-title">Solicitudes de Prestamos</span>
              </strong>
            </a>
          </li> -->


          <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php">
             <strong>
              <i class="menu-icon mdi mdi-login"></i>
              <span class="menu-title">Cerrar Sesion</span>
              </strong>
            </a>
          </li>
        </ul>
      </nav>