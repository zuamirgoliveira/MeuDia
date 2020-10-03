<!DOCTYPE html>
<html>
<head>

<?php include '../import/alterarTipoTarefas.html';?>

<title>Alterar Tarefa</title>

</head>
<body>

<?php session_start(); ?>
<?php include 'menu.php'; ?>

<!-- Pag -->
<main class="page-content">
	<div class="container-fluid">
		<?php include '../php/alterarTarefa.php'; ?>
</main>
</div>
</body>
</html>