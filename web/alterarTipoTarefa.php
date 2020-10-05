<!DOCTYPE html>
<html>
<head>

<title>Alterar Tipo de Tarefa</title>

<?php include '../import/alterarTipoTarefas.html';?>	

</head>
<body>

<?php session_start(); ?>
<?php include 'menu.php';?>

<!-- Pag -->
<main class="page-content">
    <div class="container-fluid">

		<?php include '../php/alterarTipoTarefa.php';?>
 
	</div>

</body>
</html>