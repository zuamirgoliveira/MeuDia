<!DOCTYPE html>
<html>
<head>
	
<title>Cadastrar Tarefas</title>

<?php include '../import/registrarTarefa.html';?>	

</head>
<body>

<?php session_start();?>
<?php include 'menu.php';?>

<!-- Pag -->
 <main class="page-content">
    <div class="container-fluid">

<form class="form-horizontal" action="../php/cadastrarTarefa.php" method="POST">
<fieldset>


<!-- Título-->
<div class="form-group">
  <label class="col-md-4 control-label" for="titulo">Título</label>  
  <div class="col-md-4">
  <input id="titulo" name="titulo" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Subtitulo -->
<div class="form-group">
  <label class="col-md-4 control-label" for="subtitulo">Subtitulo</label>  
  <div class="col-md-4">
  <input id="subtitulo" name="subtitulo" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Descrição -->
<div class="form-group">
  <label class="col-md-4 control-label" for="descricao">descricao</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="descricao" name="descricao"></textarea>
  </div>
</div>

<!-- Horário de Início-->
<div class="form-group">
  <label class="col-md-4 control-label" for="hinicio">Horário de Início</label>  
  <div class="col-md-1">
  <input id="hinicio" name="hinicio" type="time" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Horário de Termino -->
<div class="form-group">
  <label class="col-md-4 control-label" for="hfim">Horário de Termino</label>  
  <div class="col-md-1">
  <input id="hfim" name="hfim" type="time" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Tipo de Tarefa -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipotarefa">Tipo de Tarefa</label>
  <div class="col-md-3">
    <select id="tipotarefa" name="tipotarefa" class="form-control">
      <?php include '../php/selectTipoTarefa.php';?>
    </select>
  </div>
</div>

<!-- Prioridade -->
<div class="form-group">
  <label class="col-md-4 control-label" for="prioridade">Prioridade</label>
  <div class="col-md-3">
    <select id="prioridade" name="prioridade" class="form-control">
      <?php include '../php/selectPrioridade.php';?>
    </select>
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