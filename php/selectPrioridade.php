<?php 

include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];  

$stmt = $conexao->prepare("SELECT id,descricao FROM prioridade");
$stmt->execute();

$resultado = $stmt->fetchAll();
  
                            
echo "<option selected='selected' value='-1'>Selecione</option>"; 

foreach($resultado as $row){ 
                          
	echo "<option value=".$row['id'].">".$row['descricao']."</option>"; 	




}	














 ?>