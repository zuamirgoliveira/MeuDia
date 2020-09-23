<!DOCTYPE html>
<html>
<head>
<?php session_start();

	include '../import/alterarPerfil.html';?>

	<title>Alterar Perfil</title>
</head>
<body>
<?php
 include 'menu.php';
 ?>

<!-- Pag -->
<main class="page-content">
	<div class="container-fluid">
	<?php include '../php/alterarPerfil.php'; ?>
</main>
</div>
</body>
</html>