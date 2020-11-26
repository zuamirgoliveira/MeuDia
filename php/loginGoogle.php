<?php 
session_start();
include 'conexao.php';

$email = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);




		$stmt = $conexao->query("select id,login,senha,nome from usuario where email ='$email' LIMIT 1");
		$contagem = $stmt->rowCount();
		if($contagem == 1){

			$resultado = $stmt->fetchAll();

			foreach($resultado as $linha){
				$_SESSION['login'] =$linha["login"];
	    		$_SESSION['idusuario'] = $linha["id"];
	    		$_SESSION['nomeUsuario'] = $linha["nome"];
	    		echo '../web/timeline.php';
			}	
			
		}else{
			echo '../web/login.php?erroLogin=true';
		}




 ?>