<?php 
session_start();
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];
$idTipoTarefa = $_GET['id'];
$descricao =$_POST['descricao'];
$h_inicio =$_POST['h_inicio'];
$h_fim =$_POST['h_fim'];
$tamanhoDesc = strlen($descricao);

if(!empty($descricao) && !empty($h_fim) && !empty($h_inicio)){
	
	if($tamanhoDesc > 40){
	header("Location: ../web/alterarTipoTarefa.php?erroAlterarTarefaStr=true&id=".$idTipoTarefa);
	}else{

		if(!preg_match('/^[a-z A-Z 0-9]+$/', $descricao) == 1){

			header("Location: ../web/alterarTipoTarefa.php?erroAlterarTarefaNoStr=true&id=".$idTipoTarefa);

			
		}else{

			$stmt = $conexao->prepare("
										UPDATE
										  tipo_tarefa 
										SET
										  descricao = '$descricao', h_inicio = '$h_inicio', h_fim = '$h_fim' 
										WHERE
										  usuario = '$idUsuario' 
										  AND id = '$idTipoTarefa'");
				$stmt->execute();

				
				header("Location: ../web/tipoTarefas.php?");
		} 
	}

}else{





header("Location: ../web/alterarTipoTarefa.php?erroAlterarTarefa=true&id=".$idTipoTarefa);


}






 ?>