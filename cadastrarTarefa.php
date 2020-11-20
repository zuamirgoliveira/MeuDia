<?php 

include 'conexao.php';

try{
session_start();

$idUsuario =$_SESSION['idusuario'];  
$titulo = $_POST['titulo'];
$subtitulo =$_POST['subtitulo'];
$descricao =$_POST['descricao'];
$hinicio =$_POST['hinicio']; 
$hfim =$_POST['hfim'];
$tipotarefa =$_POST['tipotarefa']; 
$prioridade =$_POST['prioridade'];

if (!empty($titulo) && !empty($subtitulo) && !empty($descricao) && !empty($tipotarefa) && !empty($prioridade)) {
	if (strlen($titulo) > 30 && strlen($subtitulo) > 50 && strlen($descricao) > 300) {
		header("Location: ../web/registrarTarefa.php?erroCadastrarTarefaStr=true");
	}else{
		if (preg_match('/^[a-z A-Z Á-ú 0-9]+$/', $titulo) == 1 && 
			preg_match('/^[a-z A-Z Á-ú 0-9]+$/', $subtitulo) == 1 && 
			preg_match('/^[a-z A-Z Á-ú 0-9]+$/', $descricao) == 1 && 
			preg_match('/^[a-z A-Z Á-ú 0-9]+$/', $tipotarefa) == 1 && 
			preg_match('/^[a-z A-Z Á-ú 0-9]+$/', $prioridade) == 1) {
		
			$stmt = $conexao->query("
									SELECT *
									FROM usuario 
									WHERE id = '$idUsuario'");						  
			$contagem = $stmt->rowCount();
			
			if($contagem == 1){

				$resultado = $stmt->fetchAll();

				foreach($resultado as $linha){

					if(is_null($linha["h_sono_inicio"]) and is_null($linha["h_sono_fim"]) ){
							// Redirecionar para página de alterar perfil
							header("Location: ../web/alterarPerfil.php");
					}elseif(($linha["h_sono_inicio"] == '00:00:00') and ($linha["h_sono_fim"] == '00:00:00') ){
							// Redirecionar para página de alterar perfil
							header("Location: ../web/alterarPerfil.php");
					}else{
								//Verifica conflito de horário

							

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


							include 'inserirNotificacao.php';
							
							header("Location: ../web/tarefas.php");

							
					}
				}
			}
		}else{
			header("Location: ../web/registrarTarefa.php?erroCadastrarTarefaNoStr=true");
		}
	}
}else{
	header("Location: ../web/registrarTarefa.php?erroCadastrarTarefa=true");
}
}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
}
?>