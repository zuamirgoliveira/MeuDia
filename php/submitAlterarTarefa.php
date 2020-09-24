<?php 
session_start();
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];  
$idTarefa = $_GET['id'];
$titulo =  $_POST['titulo'];
$subtitulo =$_POST['subtitulo'];
$descricao =$_POST['descricao'];
$hinicio =$_POST['hinicio']; 
$hfim =$_POST['hfim'];
$tipotarefa =$_POST['tipotarefa']; 
$prioridade =$_POST['prioridade'];

$stmt = $conexao->prepare("	
							UPDATE
								tarefa 
							SET
								titulo='$titulo', 
								subtitulo='$subtitulo',
								descricao='$descricao',
								h_inicio='$hinicio',
								h_fim='$hfim',
								tipo_tarefa='$tipotarefa',
								prioridade='$prioridade'
							WHERE
								usuario='$idUsuario'
							AND
								id='$idTarefa'"
						 );
$stmt->execute();

header("Location: ../web/tarefas.php");

?>