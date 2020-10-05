<!DOCTYPE html>
<html>
<head>


<?php session_start(); ?>

<title>Cadastrar Tipo Tarefa</title>

<?php include '../import/registrarTipoTarefa.html';?>	

</head>
<body>


<?php include 'menu.php';?>

<!-- Pag -->
	<main class="page-content">
		<div class="container-fluid">
		
			<?php include '../php/erroValidaCadastrarTipoTarefa.php';?>	
			<?php include '../php/validaCadastrarTipoTarefa.php';?>	

	</main>

</div>
</body>
</html>