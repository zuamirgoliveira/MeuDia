<?php 
session_start();
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];  
$descricao =$_POST['descricao']; 

$stmt = $conexao->prepare("update tipo_tarefa set descricao='$descricao' where id='$idUsuario'");

$stmt->execute();

header("Location: ../web/tipoTarefas.php");

 ?>