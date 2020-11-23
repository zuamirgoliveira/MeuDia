<?php
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];


$stmt = $conexao->query("select nt.titulo, nt.classificacao, nt.descricao from usuario_notificacao un inner join notificacao nt on nt.id = un.notificacao  where usuario = '$idUsuario'");


$contagem = $stmt->rowCount();
$resultado = $stmt->fetchAll();
if($contagem > 0){

$resultado = $stmt->fetchAll();


foreach($resultado as $linha){

	echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
			<h5 class='alert-heading'>".$linha['titulo']."</h5>
			<div>".$linha['descricao']." </div>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			    <span aria-hidden='true'>&times;</span>
			  </button>
		  </div>";
}

}else{

	echo"<div>Não há notificações</div>";

}


?>