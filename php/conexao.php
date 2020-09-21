<?php


	try{
	
	$conexao = new PDO('mysql:host=localhost;dbname=meudia','root','');

	}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();
 

} 


?>