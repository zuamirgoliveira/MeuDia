<?php 

include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];

$stmt = $conexao->query("SELECT COUNT(id) AS count FROM usuario_notificacao WHERE usuario = '$idUsuario'");

$contagem = $stmt->rowCount();
if ($contagem >= 1) {
	$resultado = $stmt->fetchAll();	
	foreach($resultado as $linha){
		echo $linha['count'];
	}
}
 ?>