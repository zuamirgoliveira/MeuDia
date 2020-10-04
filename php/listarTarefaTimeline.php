<?php
include 'conexao.php';

echo "<div class='container timeline-completa'>

<div class='row'>
				<div class='col-md-12'>
					
					<div style='display:inline-block;width:100%;overflow-y:auto;white-space:nowrap;'>
					<ul class='timeline timeline-horizontal'>";

$idUsuario = $_SESSION['idusuario'];

$stmt = $conexao->query("
						SELECT
						  t.id,
						  t.titulo,
						  t.subtitulo,
						  t.descricao,
						  t.h_inicio,
						  t.h_fim,
						  p.descricao AS prioridade,
						  p.nemotecnico AS nemotecnico 
						FROM
						  tarefa t 
						  INNER JOIN
							prioridade p 
							ON p.id = t.prioridade 
						WHERE
						  usuario = '$idUsuario'
						  and data_tarefa = CURRENT_DATE()
						ORDER BY
						  t.h_inicio ASC");
$contagem = $stmt->rowCount();

ini_set('date.timezone', 'America/Recife');
$tempo = date("H:i:s", time());

if($contagem >= 1){

$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){
		
					echo"<li class='timeline-item'>";
					
					switch ($linha['nemotecnico']) {
					  case	"CRITICA":
						echo"<div class='timeline-badge danger'><i class='glyphicon glyphicon-check'></i></div>";
						break;
					  case	"ALTA":
						echo"<div class='timeline-badge warning'><i class='glyphicon glyphicon-check'></i></div>";
						break;
					  case	"MEDIA":
						echo"<div class='timeline-badge primary'><i class='glyphicon glyphicon-check'></i></div>";
						break;
					  case	"BAIXA":
						echo"<div class='timeline-badge success'><i class='glyphicon glyphicon-check'></i></div>";
					  break;    
					  
					  default:
						echo"<div class='timeline-badge '><i class='glyphicon glyphicon-check'></i></div>";
						break;
					}

						echo"			
							<div class='timeline-panel'>
								<div class='timeline-heading'>
									<h4 class='timeline-title'>".$linha['titulo']."</h4>
									<p><small class='text-muted'><i class='glyphicon glyphicon-time'></i>".$linha['subtitulo']."</small></p>
									<p>".$linha['h_inicio']." - ".$linha['h_fim']."</p>
								</div>
								<div class='timeline-body'>
									".$linha['descricao']."
								</div>
								<br>
								<div class='progress'>";
									if($linha['h_inicio'] > $tempo){
										echo"<div class='progress-bar progress-bar-striped progress-bar-animated role='progressbar' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100' style='width: 25%'></div>";
									} elseif ($linha['h_fim'] < $tempo){
										echo"<div class='progress-bar progress-bar-striped bg-danger progress-bar-animated role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div>";
									} elseif ($linha['h_fim'] > $tempo){
										echo"<div class='progress-bar progress-bar-striped bg-warning progress-bar-animated role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width: 50%'></div>";
									};
						echo"			
								</div>
							</div>
						</li>";       
	}
}
?>
