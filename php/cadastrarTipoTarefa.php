
<?php 

include 'conexao.php';

try{
session_start();

$idUsuario = $_SESSION['idusuario'];  

$descricao =$_POST['descricao'];
$h_inicio =$_POST['h_inicio'];
$h_fim =$_POST['h_fim'];

$stmt = $conexao->prepare("insert into tipo_tarefa(usuario,descricao,h_inicio,h_fim) values (?,?,?,?)");

$stmt -> bindParam(1,$idUsuario);
$stmt -> bindParam(2,$descricao);
$stmt -> bindParam(3,$h_inicio);
$stmt -> bindParam(4,$h_fim);
$stmt->execute();
//$idTarefa = $conexao->lastInsertId();



header("Location: ../web/tipoTarefas.php");

}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
}


 ?>