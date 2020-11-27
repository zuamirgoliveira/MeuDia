<?php
session_start();
include 'conexao.php';


	$login = $_POST['username'];
	$senha = $_POST['password'];
	if(!empty($login) && !empty($senha)){

		$stmt = $conexao->query("SELECT id,login,senha,nome, email, url_imagem FROM usuario WHERE login = '$login' AND senha='$senha'");
		$contagem = $stmt->rowCount();
		if($contagem == 1){
			$resultado = $stmt->fetchAll();
			foreach($resultado as $linha){
				$_SESSION['login'] =$linha["login"];
	    		$_SESSION['idusuario'] = $linha["id"];
				$_SESSION['nomeUsuario'] = $linha["nome"];
				$_SESSION['email'] = $linha["email"];
				$_SESSION['urlImagem'] = $linha["url_imagem"];
	    		header('Location: ../web/timeline.php');
			}	
			
		}else{
			header('Location: ../web/login.php?erroLogin=true');
		}
	}else{
			header('Location: ../web/login.php?erroLoginPreencher=true');
		}

?>
