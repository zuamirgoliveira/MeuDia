
<?php 
session_start();

include 'conexao.php';

$idTarefa = $_GET["id"];
$idUsuario = $_SESSION['idusuario'];

try{

	
		$stmt = $conexao->query("select id from tarefa where usuario='$idUsuario' and id='$idTarefa'");
		$contagem = $stmt->rowCount();	

		if($contagem > 0){

			$stmt = $conexao->prepare("delete from tarefa where id = ?");

			$stmt -> bindParam(1,$idTarefa);    
			$stmt->execute(); 

		header('Location: ../web/tarefas.php?excluirTarefaOk=true');

		}else{

		header('Location: ../web/tarefas.php?erroExcluirTarefa=true');


		}


include 'inserirNotificacao.php';

		

		

		
			 
				
}catch(PDOException $e){
		echo 'ERROR: ' . $e->getMessage();

		}
		

?>