<?php 

include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];  
$idPrioridade = $linha['id_prioridade'];
$prioridade = $linha['prioridade'];

if ($idPrioridade != null) {
	$stmt = $conexao->prepare("SELECT id,
									  descricao
								 FROM prioridade
								WHERE id != $idPrioridade");
} else {
	$stmt = $conexao->prepare("SELECT id,
									  descricao
								 FROM prioridade");
}
$stmt->execute();

$resultado = $stmt->fetchAll();

if($idPrioridade != null){
	echo "<option selected='selected' value=".$idPrioridade.">".$prioridade."</option>"; 
} else {
	echo "<option selected='selected' value='-1'>Selecione</option>";
}

foreach($resultado as $row){                           
	echo "<option value=".$row['id'].">".$row['descricao']."</option>"; 	
}	














 ?>