<?php 

include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];  
$idTipoTarefa = $linha['id_tipo_tarefa'];
$tipoTarefa = $linha['tipo_tarefa'];

if($idTipoTarefa != null){
	$stmt = $conexao->prepare("SELECT id,
									  descricao
								 FROM tipo_tarefa
								WHERE usuario = $idUsuario
								  AND id != $idTipoTarefa");
} else {
	$stmt = $conexao->prepare("SELECT id,
									  descricao
								 FROM tipo_tarefa
								WHERE usuario = $idUsuario");
}
$stmt->execute();

$resultado = $stmt->fetchAll();

if($idTipoTarefa != null){
	echo "<option selected='selected' value=".$idTipoTarefa.">".$tipoTarefa."</option>"; 
} else {
	echo "<option selected='selected' value='-1'>Selecione</option>";
}

foreach($resultado as $row){      
	echo "<option  value=".$row['id'].">".$row['descricao']."</option>"; 	
}














 ?>