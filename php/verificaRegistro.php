<?php
session_start();
include 'conexao.php';


	$login = $_POST['username'];
	$senha = $_POST['password'];
	$nome = $_POST['nome'];
    $email = $_POST['email'];

	if(!empty($login) && !empty($senha) && !empty($nome) && !empty($email) ){
		$stmt = $conexao->query("SELECT login FROM usuario WHERE login = '$login'");
		$contagem = $stmt->rowCount();
		
		if($contagem == 1){
			header('Location: ../web/registrar.php?erroRegistro=true');
		}else{
			$stmt = $conexao->prepare("INSERT INTO usuario (login, senha, nome, email) VALUES (?, ?, ?, ?)");
			$stmt -> bindParam(1,$login);
			$stmt -> bindParam(2,$senha);
			$stmt -> bindParam(3,$nome);
      		$stmt -> bindParam(4,$email);
			$sucesso = $stmt -> execute();
			$last_id = $conexao -> lastInsertId();

			if ($sucesso == 1) {
				$stmt = $conexao->prepare("INSERT INTO tipo_tarefa (descricao, usuario, h_inicio, h_fim, liga_desliga) VALUES ('Sono', $last_id, '22:00:00', '06:00:00', 0), ('Lazer', $last_id, null, null, 0), ('Estudo', $last_id, null, null, 0), ('Trabalho', $last_id, null, null, 0), ('Outros', $last_id, null, null, 0)");
				$stmt -> execute();
			}

      header('Location: ../web/login.php?registro=true');

		}
	}else{
			header('Location: ../web/login.php?erroRegistroPreencher=true');
		}

?>