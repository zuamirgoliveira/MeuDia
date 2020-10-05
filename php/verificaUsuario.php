<?php

$idUsuario = $_SESSION['idusuario'];

if(!empty($idUsuario)){
	// Existe um id de usuário conectado na session.
}else{
	header('Location: ../web/login.php');
}

?>