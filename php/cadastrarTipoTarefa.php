
<?php 

include 'conexao.php';

try{
session_start();

$idUsuario = $_SESSION['idusuario'];  

$descricao =$_POST['descricao'];

$hInicio =$_POST['h_inicio'];
$hFim =$_POST['h_fim'];

$stmt = $conexao->prepare("INSERT INTO tipo_tarefa (usuario, descricao, h_inicio, h_fim, liga_desliga) VALUES (?, ?, ?, ?, '0')");

$stmt -> bindParam(1,$idUsuario);
$stmt -> bindParam(2,$descricao);
$stmt -> bindParam(3,$hInicio);
$stmt -> bindParam(4,$hFim);

$stmt->execute();
//$idTarefa = $conexao->lastInsertId();



header("Location: ../web/tipoTarefas.php");

}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
}


 ?>