<!DOCTYPE html>
<html>
<head>
	<?php session_start(); ?>
	<title>Cadastrar Tarefas</title>
<?php include '../import/registrarTarefa.html';?>	
</head>
<body>
<?php include 'menu.php';?>

<!-- Pag -->
 <main class="page-content">
    <div class="container-fluid">

<form class="form-horizontal" action="../php/cadastrarTipoTarefa.php" method="POST">
<fieldset>


<!-- Descricao -->
<div class="form-group">
  <label class="col-md-4 control-label" for="titulo">Tipo de Tarefa</label>  
  <div class="col-md-4">
  <input id="descricao" name="descricao" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label" for="titulo">Período do Tipo tarefa</label>  
  <div class="col-md-2">
  <label class="col-md-3 control-label" for="titulo">Início</label> 
  <input id="h_inicio" name="h_inicio" type="time" placeholder="" class="form-control input-md" required="">
  <label class="col-md-3 control-label" for="titulo">Fim</label>
  <input id="h_fim" name="h_fim" type="time" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>



<!-- Registrar -->
<div class="form-group">
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-success">Cadastrar</button>
  </div>
</div>

</fieldset>
</form>

  </main>
 
</div>

</body>
</html>