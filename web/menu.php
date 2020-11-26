<?php include '../php/verificaUsuario.php';?> 
<?php include '../import/menu.html';?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name = "google-signin-client_id" content = "279705500392-hanis720lsttntdsq915u5j6cla5urm9.apps.googleusercontent.com">

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
        
        <div class="user-info" style="margin: 0 0 15px 0; ">
          <span class="user-name">
            <img src="<?php echo $_SESSION['urlImagem'];?>" alt="Meudia" width="30" height="30" style="margin-right: 10px; border-radius: 50%">
            <strong><?php echo $_SESSION['nomeUsuario']; ?></strong>
          </span>
        </div>
      
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
        <!-- sidebar-menu  -->
      </div>
    <!-- sidebar-content  -->
    <script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
  function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }
</script>
    <div class="sidebar-footer">
     <a href="#" class="sidebar-icone" data-toggle="modal" data-target="#myModal1">
        <i class="fa fa-bell"></i>
       <span class="badge badge-pill badge-warning notification" ><?php include '../php/qtdNotificacao.php'; ?></span>
      </a>
      <a href="../php/deslogar.php" onclick="signOut();" class="sidebar-icone">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->

<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
 <div class='modal ' id='myModal1' tabindex='-1' role='dialog' aria-labelledby='myModalTitle' aria-hidden='true' style="z-index: 1041">
            <div class='modal-dialog modal-dialog-centered' role='document'>
              <div class='modal-content'>
                <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Notificações</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include '../php/listarNotificacao.php'; ?>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
      </div>
              </div>
            </div>
         
          </div>
<!-- page-wrapper -->
    
