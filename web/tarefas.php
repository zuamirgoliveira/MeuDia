<!DOCTYPE html>
<html>
<head>
    

<?php 
session_start(); 
include '../import/tarefas.html';
?>

<title>Tarefas</title>

</head>
<body>

<!-- Menu-->
<?php include 'menu.php';?>
<main class="page-content">
    <div class="container-fluid">
		<div class="container">
			<?php include '../php/erroTarefa.php'; ?>
			<!--tabela-->
			<?php include '../php/listarTarefa.php';?>
		</div>
	</div>
</main>
</body>
</html>