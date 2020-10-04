<!DOCTYPE html>
<html>
<head>

<?php session_start();?>

<?php include '../import/alterarTarefa.html';?>

<title>Alterar Tarefa</title>

</head>
<body>

<?php include 'menu.php';?>

<!-- Pag -->
		<main class="page-content">
			<div class="container-fluid">
			
			<?php include '../php/erroValidaAlterarTarefa.php';?>
			<?php include '../php/alterarTarefa.php';?>
			
		</main>
	</div>
</body>
</html>