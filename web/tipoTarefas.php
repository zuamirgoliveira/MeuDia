<!DOCTYPE html>
<html>
<head>
    
<?php session_start(); ?>
<?php include '../import/tipoTarefas.html';?>

<script>
  $(function() {
    $('#btn-on').click(function() {
      let classe = document.querySelector('#btn-on').className;
      if(classe == "btn btn-primary focus" || classe == "focus btn btn-primary"){
        $("#btn-on").text("Off").removeClass('btn btn-primary').addClass('btn btn-danger');
      } else {
        $("#btn-on").text("On").removeClass('btn btn-danger').addClass('btn btn-primary');
      }
    })
  })
</script>

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