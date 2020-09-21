<!DOCTYPE html>
<html>
<head>
    
<?php session_start(); ?>
<?php include '../import/tipoTarefas.html';?>



<title>Tipos de Tarefas</title>

</head>
<body>

<!-- Menu-->
<?php include 'menu.php';?>
<!-- Erros -->


 <main class="page-content">
    <div class="container-fluid">
<?php include '../php/erroTipoTarefa.php';?>
<div class="container">
        
        <!--tabela-->
      <?php include '../php/listarTipoTarefa.php';?>
    </div>




    </div>
 </main>	

</body>
</html>