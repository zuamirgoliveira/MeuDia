<?php 
session_start();
include 'conexao.php';

$userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
$userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING); //'Zuamir Gutemberg';
$userImagem = filter_input(INPUT_POST, 'userImagem', FILTER_SANITIZE_STRING); //'https://lh3.googleusercontent.com/a-/AOh14Gi2DXdRvVGdHwx0Nnp6cs9vJZ4KIvfRLiYE-EvQww=s96-c';

		$stmt = $conexao->query("select id,login,senha,nome, url_imagem from usuario where email ='$userEmail' LIMIT 1");
		$contagem = $stmt->rowCount();
		if($contagem == 1){

			$resultado = $stmt->fetchAll();

			foreach($resultado as $linha){
				$_SESSION['login'] =$linha["login"];
				$_SESSION['idusuario'] = $linha["id"];
				$_SESSION['nomeUsuario'] = $linha["nome"];
				$_SESSION['urlImagem'] = $linha["url_imagem"];
				echo '../web/timeline.php';
			}	
			
		}else{
			$stmt = $conexao->prepare("INSERT INTO usuario (login, senha, nome, email, url_imagem) VALUES (".$userName.", '123456', ".$userName.", ".$userEmail.", ".$userImagem.")");
			$sucesso = $stmt->execute();			
			$last_id = $conexao->lastInsertId();

			if ($sucesso == 1) {
				$stmt = $conexao->prepare("INSERT INTO tipo_tarefa (descricao, usuario, h_inicio, h_fim, liga_desliga) VALUES ('Sono', ".$last_id.", '22:00:00', '06:00:00', 0), ('Lazer', ".$last_id.", null, null, 0), ('Estudo', ".$last_id.", null, null, 0), ('Trabalho', $last_id, null, null, 0), ('Outros', $last_id, null, null, 0)");
				$stmt -> execute();
				$_SESSION['login'] = $userName;
	    		$_SESSION['idusuario'] = $last_id;
				$_SESSION['nomeUsuario'] = $userName;
				$_SESSION['urlImagem'] = $userImagem;
				echo '../web/timeline.php';
			}
			echo '../web/login.php?erroLogin=true';
		}




 ?>