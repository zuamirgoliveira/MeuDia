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

if (!empty($titulo) && !empty($subtitulo) && !empty($descricao) && !empty($hinicio) && !empty($hfim) && !empty($tipotarefa) && !empty($prioridade)) {
	if (strlen($titulo) > 30 && strlen($subtitulo) > 50 && strlen($descricao) > 300) {
		header("Location: ../web/alterarTarefa.php?erroAlterarTarefaStr=true&id=".$idTarefa);
	}else{
		if (preg_match('/^[a-z A-Z 0-9]+$/', $titulo) == 1 && 
			preg_match('/^[a-z A-Z 0-9]+$/', $subtitulo) == 1 && 
			preg_match('/^[a-z A-Z 0-9]+$/', $descricao) == 1 && 
			preg_match('/[0-9]$/', $hinicio) == 1 && 
			preg_match('/[0-9]$/', $hfim) == 1 && 
			preg_match('/^[a-z A-Z 0-9]+$/', $tipotarefa) == 1 && 
			preg_match('/^[a-z A-Z 0-9]+$/', $prioridade) == 1) {
				
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
			header("Location: ../web/alterarTarefa.php?erroAlterarTarefaNoStr=true&id=".$idTarefa);
		}
	}
}else{
	header("Location: ../web/alterarTarefa.php?erroAlterarTarefa=true&id=".$idTarefa);
}

}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
}
?>