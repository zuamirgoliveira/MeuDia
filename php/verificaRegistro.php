<?php
session_start();
include 'conexao.php';


	$login = $_POST['username'];
	$senha = $_POST['password'];
	$nome = $_POST['nome'];

	if(!empty($login) && !empty($senha) && !empty($nome)){
		$stmt = $conexao->query("select login from usuario where login='$login'");
		$contagem = $stmt->rowCount();
		
		if($contagem == 1){

			header('Location: ../web/registrar.php?erroRegistro=true');

				
			
		}else{

			$stmt = $conexao->prepare("insert into usuario(login,senha,nome) values (?,?,?)");
			$stmt -> bindParam(1,$login);
			$stmt -> bindParam(2,$senha);
			$stmt -> bindParam(3,$nome);
			$stmt->execute();


			header('Location: ../web/login.php?registro=true');

		}
	}else{
			header('Location: ../web/login.php?erroRegistroPreencher=true');
		}

?>