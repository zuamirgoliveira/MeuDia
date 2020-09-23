<?php 
session_start();
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];  
$descricao =$_POST['descricao'];
$h_inicio =$_POST['h_inicio'];
$h_fim =$_POST['h_fim'];

$stmt = $conexao->prepare("update tipo_tarefa set descricao='$descricao', h_inicio='$h_inicio', h_fim='$h_fim' where id='$idUsuario'");

$stmt->execute();

header("Location: ../web/tipoTarefas.php");

 ?>