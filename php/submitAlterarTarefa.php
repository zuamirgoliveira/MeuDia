<?php 

include 'conexao.php';

try{
session_start();

$idUsuario = $_SESSION['idusuario'];  
$idTarefa = $_GET['id'];
$titulo =  $_POST['titulo'];
$subtitulo =$_POST['subtitulo'];
$descricao =$_POST['descricao'];
$hinicio =$_POST['hinicio']; 
$hfim =$_POST['hfim'];
$tipotarefa =$_POST['tipotarefa']; 
$prioridade =$_POST['prioridade'];

if (preg_match('/^[a-zA-Z0-9]+/', $titulo) == 1 && 
	preg_match('/^[a-zA-Z0-9]+/', $subtitulo) == 1 && 
	preg_match('/^[a-zA-Z0-9]+/', $descricao) == 1 && 
	preg_match('/^[0-9]+/', $hinicio) == 1 && 
	preg_match('/^[0-9]+/', $hfim) == 1 && 
	preg_match('/^[a-zA-Z0-9]+/', $tipotarefa) == 1 && 
	preg_match('/^[a-zA-Z0-9]+/', $prioridade) == 1) {
		
	$stmt = $conexao->prepare("	
								UPDATE
									tarefa 
								SET
									titulo='$titulo', 
									subtitulo='$subtitulo',
									descricao='$descricao',
									h_inicio='$hinicio',
									h_fim='$hfim',
									tipo_tarefa='$tipotarefa',
									prioridade='$prioridade'
								WHERE
									usuario='$idUsuario'
								AND
									id='$idTarefa'"
							 );
	$stmt->execute();

	header("Location: ../web/tarefas.php");
}else{
	header('Location: ../web/alterarTarefa.php');
}

}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
}

?>