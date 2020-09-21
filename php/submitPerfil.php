<?php 
session_start();
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];  
$nome =$_POST['nome']; 
$sexo =$_POST['sexo']; 
$hestudoinicio =$_POST['hestudoinicio']; 
$hestudofim =$_POST['hestudofim']; 
$hsonoinicio =$_POST['hsonoinicio']; 
$hsonofim =$_POST['hsonofim']; 
$htrabalhoinicio =$_POST['htrabalhoinicio']; 
$htrabalhofim =$_POST['htrabalhofim']; 
$hlazerinicio =$_POST['hlazerinicio'];
$hlazerfim =$_POST['hlazerfim'];



$stmt = $conexao->prepare("update usuario set nome='$nome',sexo='$sexo',h_estudo_inicio='$hestudoinicio',h_estudo_fim='$hestudofim',h_sono_inicio='$hsonoinicio',h_sono_fim='$hsonofim',h_trabalho_inicio='$htrabalhoinicio',h_trabalho_fim='$htrabalhofim',h_lazer_inicio='$hlazerinicio',h_lazer_fim='$hlazerfim' where id='$idUsuario'");

$stmt->execute();

header("Location: ../web/timeline.php");












 ?>