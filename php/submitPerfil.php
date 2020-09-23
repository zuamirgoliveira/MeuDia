<?php 
session_start();
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];  
$nome =$_POST['nome']; 
$sexo =$_POST['sexo']; 
$hsonoinicio =$_POST['hsonoinicio']; 
$hsonofim =$_POST['hsonofim']; 

$stmt = $conexao->prepare("update usuario set nome='$nome',sexo='$sexo',h_sono_inicio='$hsonoinicio',h_sono_fim='$hsonofim' where id='$idUsuario'");

$stmt->execute();

header("Location: ../web/timeline.php");
 ?>