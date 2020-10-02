<?php 
session_start();
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];
$id = $_GET['id'];
$flag = $_GET['flag'];

echo $id;

$stmt = $conexao->prepare("
						UPDATE
						  tipo_tarefa 
						SET
						  dt_desliga = SYSDATE(), liga_desliga = '$flag'
						WHERE
						  usuario = '$idUsuario' 
						  AND id = '$id'");

$stmt->execute();

 ?>
