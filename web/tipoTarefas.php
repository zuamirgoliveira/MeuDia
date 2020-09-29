<!DOCTYPE html>
<html>
<head>
    
<?php session_start(); ?>
<?php include '../import/tipoTarefas.html';?>

<script>
  function ligDesl(id, flag) {

      if(flag == 0){
        $("#btn-on-"+id).text("Off").removeClass('btn btn-primary').addClass('btn btn-danger');
        flag = 1;
      } else if (flag == 1){
        $("#btn-on-"+id).text("On").removeClass('btn btn-danger').addClass('btn btn-primary');
        flag = 0;
      }
      if(flag == 0 || flag == 1){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
          }
        }
        xmlhttp.open("GET", "../php/ligaDesligaTipoTarefa.php?id="+id+'&flag='+flag, true);
        xmlhttp.send();
      }
  }
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