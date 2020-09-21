
<?php 

include 'conexao.php';

try{
session_start();

$idUsuario = $_SESSION['idusuario'];  

$descricao =$_POST['descricao'];



$stmt = $conexao->prepare("insert into tipo_tarefa(usuario,descricao) values (?,?)");

$stmt -> bindParam(1,$idUsuario);
$stmt -> bindParam(2,$descricao);

$stmt->execute();
//$idTarefa = $conexao->lastInsertId();



header("Location: ../web/tipoTarefas.php");

}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
}


 ?>