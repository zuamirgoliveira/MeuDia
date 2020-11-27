<?php 


$countTotal = 0;

//consulta todas as tarefas do usuario
$consulta1 = "SELECT * from tarefa where usuario = '$idUsuario'";
$stmt = $conexao->query($consulta1);
$contagem = $stmt->rowCount();
if($contagem >= 1){

	$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){
		$hinicioVerificar = $linha['h_inicio'];
		$hfimVerificar = $linha['h_fim'];
		$id = $linha['id'];

		echo "//";
		echo $id;
		echo "//";
		
		echo $hinicioVerificar;
		echo "///";
		echo $hfimVerificar;
		echo "//";


		//faz a pesquisa se tem conflito de tarefas
		$consulta2 = "SELECT * from tarefa where usuario = '$idUsuario' AND ((h_inicio >= '$hinicioVerificar' and h_inicio <= '$hfimVerificar') or (h_fim >= '$hfimVerificar' and h_fim <= '$hinicioVerificar')) AND id != '$id'";
		echo $consulta2;

		$stmt = $conexao->query($consulta2);
		$contagem2 = $stmt->rowCount();

		if($contagem2 >= 1){
			$countTotal = $countTotal + 1;
			echo "//";
			// verifica se já existe notificação de conflito
			$consulta3 = "SELECT * FROM usuario_notificacao where usuario = '$idUsuario' and notificacao='1'";
			echo $consulta3;
			$stmt = $conexao->query($consulta3);
			$contagem3 = $stmt->rowCount();
			if($contagem3 >= 1){
				

				echo ' chegou 1';
				header("Location: ../web/tarefas.php");
			}else{

			$idUsuario =$_SESSION['idusuario'];  

			// notificação de conflito de horário
			$stmt = $conexao->prepare("insert into usuario_notificacao(usuario,notificacao) values(?,?)");

			$stmt -> bindParam(1,$idUsuario);
			$not = 1;
			$stmt -> bindParam(2,$not);
			$stmt->execute();
			header("Location: ../web/tarefas.php");
			echo ' chegou 2';
		}
}

	




}



}

if($countTotal == 0){
$stmt = $conexao->prepare("DELETE FROM usuario_notificacao where usuario = '$idUsuario' and notificacao='1'");
$stmt->execute();
header("Location: ../web/tarefas.php?acb");
}
 ?>
