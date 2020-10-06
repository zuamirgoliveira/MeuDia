<?php 

include 'conexao.php';

try{
session_start();

$idUsuario = $_SESSION['idusuario'];  
$descricao =$_POST['descricao'];
$h_inicio =$_POST['h_inicio'];
$h_fim =$_POST['h_fim'];

if (!empty($descricao) && !empty($h_inicio) && !empty($h_fim)) {
	if (strlen($descricao) > 30) {
		header("Location: ../web/registrarTipoTarefa.php?erroCadastrarTipoTarefaStr=true");
	}else{
		if (preg_match('/^[a-z A-Z 0-9]+$/', $descricao) == 1 && 
			preg_match('/[0-9]$/', $h_inicio) == 1 && 
			preg_match('/[0-9]$/', $h_fim) == 1) {

			$stmt = $conexao->prepare("
									INSERT INTO
									   tipo_tarefa (usuario, descricao, h_inicio, h_fim, liga_desliga) 
									VALUES
									   (?, ?, ?, ?, '0')");

			$stmt -> bindParam(1,$idUsuario);
			$stmt -> bindParam(2,$descricao);
			$stmt -> bindParam(3,$h_inicio);
			$stmt -> bindParam(4,$h_fim);
			
			$stmt->execute();
			
			header("Location: ../web/tipoTarefas.php");
		}else{
			header("Location: ../web/registrarTipoTarefa.php?erroCadastrarTipoTarefaNoStr=true");
		}
	}
}else{
	header("Location: ../web/registrarTipoTarefa.php?erroCadastrarTipoTarefa=true");
}

}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
}

?>