<?php 
session_start();
include 'conexao.php';
		
	$email = $_POST['email'];
	$novaSenha = '123456'; //substr(md5(time()), 0,6);
	//Quando for configurado o SMTP para envio de email a partir do servidor local, descomentar linha cima e remover a senha padrão.

	//if(mail($email, 'Sua nova senha', 'Sua nova senha é '.$novaSenha)) {
		$stmt = $conexao->query("SELECT * FROM usuario WHERE email = '$email'");
		$rows = $stmt->rowCount();
	
		if($rows >= 1) {
			$resultado = $stmt->fetchAll();
			foreach($resultado as $linha) {
				$stmt = $conexao->prepare("UPDATE usuario SET senha = '$novaSenha' WHERE email = '$email'");
				$stmt->execute();
			}
	
		}
	//}


	header('Location: ../web/login.php?recuperarSenha=true');

?>