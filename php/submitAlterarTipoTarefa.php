<?php 
session_start();
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];
$idTipoTarefa = $_GET['id'];
$descricao =$_POST['descricao'];
$hInicio =$_POST['h_inicio'];
$hFim =$_POST['h_fim'];

$stmt = $conexao->prepare("
						UPDATE
						  tipo_tarefa 
						SET
						  descricao = '$descricao', h_inicio = '$hInicio', h_fim = '$hFim' 
						WHERE
						  usuario = '$idUsuario' 
						  AND id = '$idTipoTarefa'");
$stmt->execute();

header("Location: ../web/tipoTarefas.php");

 ?>