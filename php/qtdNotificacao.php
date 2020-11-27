<?php 


include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];


$stmt = $conexao->query("select count(id) as count from usuario_notificacao where usuario = '$idUsuario'");


$resultado = $stmt->fetchAll();

foreach($resultado as $linha){

	echo $linha['count'];
}




 ?>
