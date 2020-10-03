<?php 

include 'conexao.php';

try{
session_start();

$idUsuario = $_SESSION['idusuario'];  
$descricao =$_POST['descricao'];
$h_inicio =$_POST['h_inicio'];
$h_fim =$_POST['h_fim'];

if (preg_match('/^[a-zA-Z0-9]+/', $descricao) == 1 && 
	preg_match('/^[0-9]+/', $h_inicio) == 1 && 
	preg_match('/^[0-9]+/', $h_fim) == 1) {

	$stmt = $conexao->prepare("
							INSERT INTO
							   tipo_tarefa(usuario, descricao, h_inicio, h_fim) 
							VALUES
							   (?,?,?,?)");

	$stmt -> bindParam(1,$idUsuario);
	$stmt -> bindParam(2,$descricao);
	$stmt -> bindParam(3,$h_inicio);
	$stmt -> bindParam(4,$h_fim);
	
	$stmt->execute();
	
	//$idTarefa = $conexao->lastInsertId();
	
	header("Location: ../web/tipoTarefas.php");
}else{
	header('Location: ../web/registrarTipoTarefa.php');
}
}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
}

?>