<?php include '../php/verificaUsuario.php';?> 
<?php include '../import/menu.html';?>

<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href=""><img src="../css/img/logo-meudia-sol.png" alt="Meudia" width="30" height="30"> Meu dia</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        
        <div class="user-info">
          <span class="user-name">
            <strong><?php echo $_SESSION['nomeUsuario']; ?></strong>
          </span>
      
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>Menu</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-ellipsis-h"></i>
              <span>Timeline</span>
              <!--<span class="badge badge-pill badge-warning">+</span> -->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="timeline.php">Timeline
                    <!--<span class="badge badge-pill badge-success">Pro</span> -->
                  </a>
                </li> 
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Perfil</span>
              <!-- <span class="badge badge-pill badge-danger">3</span>-->
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Meu Perfil
                  </a>
                </li>
                <li>
                  <a href="alterarPerfil.php">Editar Perfil</a>
                </li>
                </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-list"></i>
              <span>Registros</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="tarefas.php">Tarefas</a>
                </li>
                <li>
                  <a href="tipoTarefas.php">Tipos de Tarefas</a>
                </li>
                
               </ul>
            </div>
          </li>
          <!-- <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-chart-line"></i>
              <span>Charts</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Pie chart</a>
                </li>
                <li>
                  <a href="#">Line chart</a>
                </li>
                <li>
                  <a href="#">Bar chart</a>
                </li>
                <li>
                  <a href="#">Histogram</a>
                </li>
              </ul>
            </div>
          </li> -->
          <!--<li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-globe"></i>
              <span>Maps</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Google maps</a>
                </li>
                <li>
                  <a href="#">Open street map</a>
                </li>
              </ul>
            </div>
          </li> -->
          <!--
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Documentation</span>
              <span class="badge badge-pill badge-primary">Beta</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Examples</span>
            </a>
          </li>
        -->
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#" class="sidebar-icone">
        <i class="fa fa-bell"></i>
       <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="../php/deslogar.php" class="sidebar-icone">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->


 
<!-- page-wrapper -->
    
