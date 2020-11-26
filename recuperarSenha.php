<?php 

	include 'conexao.php';;
	
	//if(isset($_POST[ok])){
		
		$email = $_POST['email'];
		if(!empty($login) && !empty($senha)){

			$stmt = $conexao->query("select login,senha from usuario where email='$email'");
			$contagem = $stmt->rowCount();
			if($contagem == 1){

				$resultado = $stmt->fetchAll();
		
		//if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		//	$erro[] = "E-mail inválido."
		//}
			foreach($resultado as $linha){	
				$stmt = $conexao->query("select login,senha from usuario where email='$email'");
		
		if($contagem == 0)
		$erro[] = "O e-mail informado não existe no banco de dados."
		if(/*count($erro) == 0 && */ $contagem == 1){
					
			$novasenha = substr(md5(time()), 0,6);
			$ncriptografada = md5(md5($novasenha));
			
			if(mail($email, "Sua nova senha", "Sua nova senha: ".$novasenha)){
				
				$sql_code = "UPDATE usuario SET senha = '$ncriptografada' WHERE email = '$email'";
				$sql_query = $mysql->query($sql_code) or die($mysqli->error);
				
			}
			}	
		}
	}
	
?>
<html>
<head>
	<meta charset"utf-8">
</head>
<body>
	<?php if(count($erro) > 0 )
		foreach($erro as $msg){
			echo "<p>$msg</p>";
		}
<form method="POST" action="">
	<input placeholder="Seu e-mail" name="email" type="text">
	<input name="ok" value="ok" type = "submit">
</form>
</html>