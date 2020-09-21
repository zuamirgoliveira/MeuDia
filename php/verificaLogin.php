<?php
session_start();
include 'conexao.php';


	$login = $_POST['username'];
	$senha = $_POST['password'];
	if(!empty($login) && !empty($senha)){

		$stmt = $conexao->query("select id,login,senha,nome from usuario where login='$login' and senha='$senha'");
		$contagem = $stmt->rowCount();
		if($contagem == 1){

			$resultado = $stmt->fetchAll();

			foreach($resultado as $linha){
				$_SESSION['login'] =$linha["login"];
	    		$_SESSION['idusuario'] = $linha["id"];
	    		$_SESSION['nomeUsuario'] = $linha["nome"];
	    		header('Location: ../web/timeline.php');
			}	
			
		}else{
			header('Location: ../web/login.php?erroLogin=true');
		}
	}else{
			header('Location: ../web/login.php?erroLoginPreencher=true');
		}

?>