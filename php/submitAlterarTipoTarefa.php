<?php 
session_start();
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];
$idTipoTarefa = $_GET['id'];
$descricao =$_POST['descricao'];
$h_inicio =$_POST['h_inicio'];
$h_fim =$_POST['h_fim'];

$stmt = $conexao->prepare("
						UPDATE
						  tipo_tarefa 
						SET
						  descricao = '$descricao', h_inicio = '$h_inicio', h_fim = '$h_fim' 
						WHERE
						  usuario = '$idUsuario' 
						  AND id = '$idTipoTarefa'");
$stmt->execute();

header("Location: ../web/tipoTarefas.php");

 ?>