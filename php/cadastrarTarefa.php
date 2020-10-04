
<?php 

include 'conexao.php';

try{
session_start();

$idUsuario = $_SESSION['idusuario'];  
$titulo =  $_POST['titulo'];
$subtitulo =$_POST['subtitulo'];
$descricao =$_POST['descricao'];
$hinicio =$_POST['hinicio']; 
$hfim =$_POST['hfim'];
$tipotarefa =$_POST['tipotarefa']; 
$prioridade =$_POST['prioridade'];


$stmt = $conexao->query("select h_sono_inicio,h_sono_fim from usuario where id='$idUsuario'");
		$contagem = $stmt->rowCount();
		if($contagem == 1){

			$resultado = $stmt->fetchAll();

			foreach($resultado as $linha){

				if(is_null($linha["h_sono_inicio"]) and is_null($linha["h_sono_fim"]) ){

						// redirecionar para pag de perfil, completar algumas informações

				}else{

							$stmt = $conexao->prepare("insert into tarefa(usuario,titulo,subtitulo,descricao,h_inicio,h_fim,tipo_tarefa,prioridade,data_tarefa) values (?,?,?,?,?,?,?,?,CURRENT_DATE())");

							$stmt -> bindParam(1,$idUsuario);
							$stmt -> bindParam(2,$titulo);
							$stmt -> bindParam(3,$subtitulo);
							$stmt -> bindParam(4,$descricao);
							$stmt -> bindParam(5,$hinicio);
							$stmt -> bindParam(6,$hfim);
							$stmt -> bindParam(7,$tipotarefa);
							$stmt -> bindParam(8,$prioridade);

							$stmt->execute();
							//$idTarefa = $conexao->lastInsertId();



							header("Location: ../web/tarefas.php");



						}


			}



		}




}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
}


 ?>