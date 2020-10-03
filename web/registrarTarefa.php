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
			
			<?php include '../php/validaCadastrarTarefa.php';?>

		</main>
	</div>
	
</body>
</html>