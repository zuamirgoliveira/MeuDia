
<?php 
session_start();

include 'conexao.php';

$idTipoTarefa = $_GET["id"];
$idUsuario = $_SESSION['idusuario'];

try{

		/* Verifica se existe tarefas com o tipo_tarefa informado */
		$stmt = $conexao->query("select titulo from tarefa where tipo_tarefa='$idTipoTarefa'");
		$contagem = $stmt->rowCount();

		if($contagem > 0){

			header('Location: ../web/tipoTarefas.php?erroTipoTarefa=true');


		}else{

		$stmt = $conexao->query("select id from tipo_tarefa where usuario='$idUsuario' and id='$idTipoTarefa'");
		$contagem = $stmt->rowCount();	

		if($contagem > 0){

			$stmt = $conexao->prepare("delete from tipo_tarefa where id = ?");

			$stmt -> bindParam(1,$idTipoTarefa);    
			$stmt->execute(); 

		header('Location: ../web/tipoTarefas.php?TipoTarefaOk=true');

		}else{

		header('Location: ../web/tipoTarefas.php?erroTipoTarefaUsuario=true');


		}




		}

		

		
			 
				
}catch(PDOException $e){
		echo 'ERROR: ' . $e->getMessage();

		}
		

?>